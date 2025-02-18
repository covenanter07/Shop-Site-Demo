<?php
ob_start(); // 開始緩衝輸出
include('includes/header.php');
include('functions/userfunction.php');
include('authencticate.php');
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    // 檢查 .env 檔案是否存在
    if (!file_exists(__DIR__ . '/.env')) {
        throw new Exception('.env file not found. Please create one in the root directory.');
    }

    // 載入環境變數
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // 獲取 PayPal Client ID（使用更安全的方式）
    $paypalClientId = $_ENV['PAYPAL_CLIENT_ID'] ?? null;

    if (!$paypalClientId) {
        throw new Exception('PAYPAL_CLIENT_ID is not set in .env file');
    }

    $paypalClientId = htmlspecialchars($paypalClientId);
} catch (Exception $e) {
    // 記錄錯誤（在正式環境中應該使用適當的錯誤日誌）
    error_log('PayPal Configuration Error: ' . $e->getMessage());

    // 顯示對用戶友善的錯誤訊息
    die('Payment system configuration error. Please contact support.');
}

// payment
$cartItems = getCartItems();

if (mysqli_num_rows($cartItems) == 0) {
    header('Location: index.php');
}

?>


<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home /
            </a>
            <a class="text-white" href="checkout.php">
                checkout
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter your full name"
                                        class="form-control">
                                    <small class="text-danger name"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">E-mail</label>
                                    <input type="email" name="email" id="email" placeholder="Enter your email"
                                        class="form-control">
                                    <small class="text-danger email "></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" id="phone" placeholder="Enter your phone number"
                                        class="form-control">
                                    <small class="text-danger phone "></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin Code</label>
                                    <input type="text" name="pincode" id="pincode" placeholder="Enter your pin code"
                                        class="form-control">
                                    <small class="text-danger pincode "></small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" id="address" class="form-control" rows="5"></textarea>
                                    <small class="text-danger address "></small>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>

                            <?php $items = getCartItems();
                            $totalPrice = 0;

                            foreach ($items as $citem) {
                            ?>
                                <div class="mb-1 border">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80">
                                        </div>
                                        <div class="col-md-5">
                                            <label><?= $citem['name'] ?></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label><?= $citem['selling_price'] ?></label>
                                        </div>
                                        <div class="col-md-2">
                                            <label>x <?= $citem['prod_qty'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                            }



                            ?>
                            <hr>
                            <h5>Total Price : <span class="float-end fw-bold"> <?= $totalPrice ?></span></h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">
                                    Confirm and place order | COD
                                </button>
                                <div id="paypal-button-container" class="mt-3"></div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<?php include('includes/footer.php'); 
ob_end_flush(); // 結束並輸出緩衝內容
?>
<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=<?= $paypalClientId ?>&currency=USD"></script>
</script>

<script>
    paypal.Buttons({
        onClick: function() {
            // 使用 const 一次性宣告所有表單值
            const name = $('#name').val();
            const email = $('#email').val();
            const phone = $('#phone').val();
            const pincode = $('#pincode').val();
            const address = $('#address').val();

            // 清除之前的錯誤訊息
            $('.error-message').text("");

            // 驗證欄位並顯示錯誤訊息
            const validations = {
                name: {
                    element: '.name',
                    message: '*This field is required'
                },
                email: {
                    element: '.email',
                    message: '*This field is required'
                },
                phone: {
                    element: '.phone',
                    message: '*This field is required'
                },
                pincode: {
                    element: '.pincode',
                    message: '*This field is required'
                },
                address: {
                    element: '.address',
                    message: '*This field is required'
                }
            };

            // 檢查每個欄位
            Object.entries(validations).forEach(([field, validation]) => {
                if (eval(field).length === 0) {
                    $(validation.element).text(validation.message);
                }
            });

            // 如果有任何一個欄位為空，返回 false
            return ![name, email, phone, pincode, address].some(field => field.length === 0);
        },
        // Create order
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $totalPrice ?>'
                    }
                }]
            });
        },

        // Handle approved payment
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                const transaction = orderData.purchase_units[0].payments.captures[0];

                // Collect form data
                const formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    pincode: $('#pincode').val(),
                    address: $('#address').val(),
                    payment_mode: "Paid by PayPal",
                    payment_id: transaction.id,
                    placeOrderBtn: true
                };

                // Send order to server
                $.ajax({
                    method: "POST",
                    url: "functions/placeorder.php",
                    data: formData,
                    success: function(response) {
                        if (response == 201) {
                            alertify.success('Order Placed Successfully');
                            window.location.href = 'my-orders.php';
                        } else {
                            alertify.error('Something went wrong');
                        }
                    },
                    error: function(xhr, status, error) {
                        alertify.error('Error processing order');
                        console.error('Order processing error:', error);
                    }
                });
            });
        },

        // Handle errors
        onError: function(err) {
            console.error('PayPal error:', err);
            alertify.error('Payment error occurred. Please try again.');
        }
    }).render('#paypal-button-container');
</script>
