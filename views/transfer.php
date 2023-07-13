<!-- views/dashboard.php -->
<?php
// Check if the username is set in the session
if (isset($_SESSION['USERNAME'])) {
    $username = $_SESSION['USERNAME'];

    include __DIR__ .'/../models/database.php';

    $result = mysqli_query($dbcon, "SELECT * FROM users WHERE username = '$username'");

    $user = []; // Array to store user data

        if ($row = mysqli_fetch_assoc($result)) {
            $user['user_id'] = $row['user_id'];
            $user['username'] = $row['username'];
            $user['role'] = $row['role'];
            $user['access_token'] = $row['access_token'];
            $user['fullname'] = $row['fullname'];
            $user['password'] = $row['password'];
            $user['acc_no'] = $row['acc_no'];
            $user['balance'] = $row['balance'];
        }
        
    
            // Retrieve transactions based on user ID
            $userId= $user['user_id'] = $row['user_id'];

            $transactionsQuery = "SELECT * FROM `accounts` WHERE user_id = '$userId'";
            //SELECT * FROM `accounts` WHERE (`accounts`.`account_id` = 1) OR (`accounts`.`account_id` = 2)
            $transactionsResult = mysqli_query($dbcon, $transactionsQuery);

    
            if ($transactionsResult) {
                // Array to store transactions
                $transactions = [];
            
                // Loop through each transaction and add it to the array
                while ($transaction = mysqli_fetch_assoc($transactionsResult)) {

                    $transactions[] = [
                        'amount' => $transaction['amount'],
                        'type' => $transaction['transaction_type'],
                        'date' => $transaction['transaction_date'],
                        'remark' => $transaction['remarks']
                    ];
                }
            } else {
                echo "Error retrieving transactions: " . mysqli_error($dbcon);
            }
        
        
    

     ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap");
body { background-color: rgb(41, 45, 50); margin: 0px; display: flex; }
.Box-logo { color: white; font-size: 1.8em; margin: 40px auto 66px; width: 118px; font-weight: bold; animation-name: InfoUser; }
* { font-family: Inter, sans-serif; padding-left: 0px; outline: none; animation-duration: 2s; }

.chart-box-main>div {
    width: 100%;
    height: 100%;
    background: #32363b;
    border-radius: 19px;
}
.stocks-status { position: absolute; right: 12px; top: 23px; font-size: 14px; }
.stocks-number { font-size: 23px; }
.stocks-titles { margin-top: 3px; margin-right: 17px; }
.stocks-main { background: linear-gradient(270deg, rgba(255, 255, 255, 0.28), rgb(42, 46, 50) 52%); padding: 1px; border-radius: 18px; margin-top: 17px; width: 380px; animation-name: Stocks; }
.sub-stocks { display: flex; background: rgb(42, 46, 50); border-radius: 18px; padding: 16px; color: white; position: relative; }
.stocks { width: 1000px; margin-left: 106px; }
.box-travel { width: 100%; }
.sub-stocks > img { width: 30px; height: 30px; margin-right: 13px; }
.up-trans { color: rgb(0, 150, 108) !important; }
.down-trans { color: red !important; }
.info-trans-sub > div { font-size: 13px; color: rgb(122, 122, 122); }
.money-time-trans-sub > div { font-size: 12px; color: rgb(122, 122, 122); text-align: center; }
.money-time-trans-sub { color: white; position: absolute; right: 13px; margin-top: 5px; }
.info-trans-sub { color: white; margin-top: 5px; }
.money-time-trans-sub > h5 { margin: 0px; text-align: center; padding-left:55px;}
.info-trans-sub > h5 { padding: 0px; margin: 0px; }
.box-trans-sub > img { width: 45px; height: 45px; border-radius: 8px; margin-right: 12px; }
.box-trans-sub { display: flex; margin-top: 12px; animation-name: Transction; }
.transction { width: 100%; position: relative; }
.chart-box-main {background: linear-gradient(270deg, rgba(255, 255, 255, 0.28), rgb(50, 54, 59) 52%);width: 100%;border-radius: 19px;box-shadow: rgba(0, 0, 0, 0.18) 0px 0px 10px 0px;height: 325px;margin-top: 15px;animation-name: Activities;padding: 1px;}
.value-travel > span { font-size: smaller; }
.value-travel { position: absolute; bottom: 24px; right: 24px; color: white; font-weight: 400; }
.title-travel { position: absolute; left: 21px; font-size: 24px; color: white; font-weight: bold; bottom: 21px; }
.box-travel > .title-element { margin-bottom: 50px; }
.box-chart-travel { position: relative; margin-left: 4px; }
.chart-travel-data { background-color: rgb(89, 95, 247); }
.chart-back-2 { background-color: rgb(247, 193, 89); transform: rotate(14deg); left: 9px; top: -2px; width: 286px !important; height: 263px !important; border-radius: 40px 40px 98px 98px !important; }
.chart-back-1 { background-color: rgb(252, 63, 77); transform: rotate(33deg); left: 12px; top: 4px; width: 286px !important; height: 266px !important; border-radius: 40px 40px 132px 98px !important; }
.chart-travel { border-radius: 40px; width: 280px; height: 280px; position: absolute; animation-name: InfoUser; }
.title-element { color: white; font-weight: 700; }
.Box-elements { margin: 35px 5% 0px; padding-bottom: 55px; }
.chart-box { border-radius: 19px; margin-right: 6%; width: 118%; position: relative; }
.box-element-flex { display: flex; margin-top: 20px; }
.staus-box-alert { width: 10px; height: 10px; background-color: rgb(244, 67, 54); border-radius: 100%; position: absolute; left: 13px; top: 7px; }
.info-name { color: rgb(191, 191, 191); line-height: 44px; }
.box-alert { display: flex; }
.box-infomation { display: flex; }
input.input-search { background-color: rgb(50, 54, 59); border: none; height: 36px; width: 260px; border-radius: 14px; color: rgb(191, 191, 191); animation-name: Search; }
.Box-search { padding: 1px 1px 1px 16px; border-radius: 14px; background: linear-gradient(270deg, rgba(255, 255, 255, 0.28), rgb(50, 54, 59) 52%); }
.box-alert-infomation { position: absolute; right: 5%; display: flex; animation-name: InfoUser; }
.Box-header { display: flex; margin: 43px 5% 0px; }
img.info-avatar { width: 40px; height: 40px; border-radius: 100%; margin: 0px 10px; border: 1px solid rgb(191, 191, 191); }
svg.icon-alert { width: 25px; height: 25px; fill: rgb(191, 191, 191); margin-top: 9px; }
.Page { position: absolute; background-color: rgb(37, 39, 44); height: 100%; width: 81%; right: 0px; border-radius: 60px 0px 0px 60px; overflow: overlay; }
.icon-menu { width: 17px; height: 17px; fill: white; margin-right: 16px; animation-name: Icon-Menu; }
li.li-mneu { display: flex; padding: 14px 24px; margin-bottom: 6px; cursor: pointer; position: relative; animation-name: li-Menu; }
div.title-menu { color: white; font-size: 14px; animation-name: Font-Menu; }
.Side-bar { width: 19%; height: 100%; position: absolute; left: 0px; top: 0px; }
.logout { margin-top: 50px; }
.Active-menu { background: linear-gradient(92deg, rgb(89, 95, 247) -229%, transparent 94%); border-left: 4px solid rgb(89, 95, 247); }
svg.icon-search { width: 19px; height: 19px; margin-bottom: -4px; margin-right: 5px; }
@keyframes Search { 
  0% { width: 0px; }
  100% { width: 260px; }
}
@keyframes li-Menu { 
  0% { left: -165px; }
  100% { left: 0px; }
}
@keyframes InfoUser { 
  0% { transform: scale(0); opacity: 0; }
  100% { transform: scale(1); opacity: 1; }
}
@keyframes Transction { 
  0% { transform: translateX(-600px); }
  100% { transform: translateX(0px); }
}
@keyframes Activities { 
  0% { width: 0%; }
  100% { width: 100%; }
}
@keyframes Stocks { 
  0% { transform: translateY(256px); }
  100% { transform: translateY(0px); }
}


    </style>
</head>
<body>
<div class="Side-bar">
        <div class="Box-logo">Banking</div>
        <div class="Box-menu">
            <ul class="ul-menu">
                <li class="li-mneu Active-menu">
                    <img class="icon-menu" src="https://i.ibb.co/94t76CZ/icons8-dashboard-32.png"/>
                    <div class="title-menu">Dashboard</div>
                </li>
            </ul>
            <ul class="ul-menu">
                <li class="li-mneu">
                    <img class="icon-menu" src="https://i.ibb.co/9wjx54x/icons8-transfer-24.png"/>
                    <div class="title-menu">Transfer</div>
                </li>
            </ul>
        </div>
    </div>
    <div class="Page">
        <div class="Box-header">
            <div class="box-alert-infomation">
                <div class="box-infomation">
                    <img class="info-avatar" src="https://www.gravatar.com/avatar/bdb5b5c084e302df00d5963fcd6691b3?s=999999&d=identicon">
                    <div class="info-name"><?php  echo $username ?></div>
                </div>
            </div>
        </div>
        <div class="Box-elements">
            <div class="box-element-flex">
            </div>
            <div class="box-element-flex">
            <div class="transction">
                    <div class="title-element">Transaction History</div>
                <?php
                foreach ($transactions as $index => $transaction) {
                ?>
                
                    <div class="box-trans-sub">
                     <?php if($transaction['type'] === 'deposit' ){ ?>
                        <img src="https://i.ibb.co/ZfWchkW/icons8-deposit-48.png"
                            alt=""><?php } else {?>
                        <img src="https://i.ibb.co/hMZ0gjC/icons8-initiate-money-transfer-48.png"
                            alt=""><?php } ?>
                        <div class="info-trans-sub">
                            <h5><?php echo $transaction['remark'];?></h5>
                            <div><?php echo $transaction['type'];?></div>
                        </div>
                        <div class=" money-time-trans-sub ">
                            <?php if($transaction['type'] === 'deposit' ){ ?>
                            <h5 class="up-trans">+<?php echo $transaction['amount'];?></h5>
                            <div><?php echo $transaction['date'];?></div><?php } else {?>
                            <h5 class="down-trans">-<?php echo $transaction['amount'];?></h5>
                            <div><?php echo $transaction['date'];?></div> <?php } ?>
                        </div>
                    </div><?php }?>
                </div>
                <div class="stocks ">
                    <div class="title-element">Current Balance</div>
                    <div class="stocks-main">
                        <div class="sub-stocks">
                            <img src="https://i.ibb.co/WvfNphd/icons8-wallet.gif" alt="">
                            <div class="stocks-titles">Saving</div>
                            <div class="stocks-number">Rs: <?php echo $user['balance'];?></div>
                            <div class="stocks-status">-6.2645%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
<?php
} else {
    // Redirect to the login page if the username is not set
    header("Location: /login");
    exit;
}
