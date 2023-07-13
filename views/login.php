<html>

<head>
    <style>
        * {

            margin: 0;

            padding: 0;

            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

        }

        section {

            display: flex;

            justify-content: center;

            align-items: center;

            min-height: 100vh;

            width: 100%;



            background: url("https://i.postimg.cc/9QVnRsf4/marvin-meyer-SYTO3xs06f-U-unsplash.jpg")no-repeat;

            background-position: center;

            background-size: cover;

        }

        .form-box {

            position: relative;

            width: 400px;

            height: 450px;

            background: transparent;

            border: none;

            border-radius: 20px;

            backdrop-filter: blur(15px) brightness(80%);



            display: flex;

            justify-content: center;

            align-items: center;

        }

        h2 {

            font-size: 2em;

            color: #fff;

            text-align: center;

        }

        .inputbox {

            position: relative;

            margin: 30px 0;

            width: 310px;

            border-bottom: 2px solid #fff;

        }

        .inputbox label {

            position: absolute;

            top: 50%;

            left: 5px;

            transform: translateY(-50%);

            color: #fff;

            font-size: 1em;

            pointer-events: none;

            transition: .5s;

        }

        /* animations: start */

        input:focus~label,

        input:valid~label {

            top: -5px;

        }

        /* animation:end */

        .inputbox input {

            width: 100%;

            height: 50px;

            background: transparent;

            border: none;

            outline: none;

            font-size: 1em;

            padding: 0 35px 0 5px;

            color: #fff;

        }

        .inputbox ion-icon {

            position: absolute;

            right: 8px;

            color: #fff;

            font-size: 1.2em;

            top: 20px;

        }

        .forget {

            margin: -10px 0 17px;

            font-size: .9em;

            color: #fff;

            display: flex;

            justify-content: space-between;

        }

        .forget label input {

            margin-right: 3px;

        }

        .forget a {

            color: #fff;

            text-decoration: none;

        }

        .forget a:hover {

            text-decoration: underline;

        }

        button {

            width: 100%;

            height: 40px;

            border-radius: 40px;

            background-color: #fff;

            border: none;

            outline: none;

            cursor: pointer;

            font-size: 1em;

            font-weight: 600;

        }

        .register {

            font-size: .9em;

            color: #fff;

            text-align: center;

            margin: 25px 0 10px;

        }

        .register p a {

            text-decoration: none;

            color: #fff;

            font-weight: 600;

        }

        .register p a:hover {

            text-decoration: underline;

        }

        /* Responsiveness:Start */
        @media screen and (max-width:480px) {
            .form-box {
                width: 100%;
                border-radius: 0px;
            }
        }

        /* Responsiveness:End */

        .buttonLink {
  color: #275d8b;
}

.verticalButton {
  padding:0px 0px 0px 0px;
    width: 250px;
    height:40px;
    background:#FF931E;
    border-radius: 0px 0px 5px 5px;
    -moz-transform:rotate(90deg);
    -ms-transform:rotate(90deg);
    -o-transform:rotate(90deg);
    -webkit-transform:rotate(90deg);
    position: fixed;
    right: -105px;
  top: 200px;
}
    </style>
</head>

<body>

    <section>

        <div class="form-box">

            <div class="form-value">

                <form action="" method="POST">

                    <h2>Login</h2>

                    <div class="inputbox">

                        <ion-icon name="mail-outline"></ion-icon>

                        <input id="username" value="" name="username" type="text" required="" />

                        <label>Username</label>

                    </div>

                    <div class="inputbox">

                        <ion-icon name="lock-closed-outline"></ion-icon>

                        <input id="password" name="password" type="password" required="" />

                        <label>Password</label>

                    </div>

                    <div class="forget">

                        <label><input type="checkbox">Remember Me</label>

                        <a href="#">Forgot Password</a>

                    </div>

                    <button>Log In</button>

                    <div class="register">

                        <p>Don't have an account? <a href="#">Sign Up</a></p>

                    </div>

                </form>

            </div>

        </div>

    </section>

    <!-- ion-icon installation: Start -->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!--ion-icon installation: End-->

    <a class="buttonLink" href="/bank/auth/bank/login"><button type="button" class="btn btn-large verticalButton">Banker Login</button></a>

</body>

</html>