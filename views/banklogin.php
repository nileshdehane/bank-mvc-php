<?php ?><html>

<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

html, body {
  height: 100%;
}

body {
  font-family: 'Rubik', sans-serif;
  display: flex;
  background: linear-gradient(to bottom, #0F123B, #000);
  color: #fff;
  
  @media (max-width: 860px) {
    flex-direction: column;
  }
}

.right-container, .left-container {
  flex: 1;
  flex-shrink: 0;
  
  @media (max-width: 860px) {
    flex: 1 0 auto;
  }
}

.left-container {
  background-image: url(https://images.unsplash.com/photo-1686706763783-1378f598d8c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1287&q=80);
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}

.right-container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 15px;
  overflow: auto;}
  
  h2 {
    font-size: 30px;
  }
  
  p {
    opacity: .5;
    margin: 5px 0 10px;
  }
  
  input {
    width: 350px;
    padding: 15px 20px;
    border-radius: 100px;
    border: 1px solid rgba(255, 255, 255, .5);
    background: transparent;
    color: #fff;}
    
    :focus {
      outline: none;
    } 
  
  
  label {
    margin-top: 20px;
    font-size: 14px;
  }
  
  bottom-text {
    text-align: center;
    margin-top: 22px;
    font-size: 14px;
    color: rgba(255, 255, 255, .5);}
    
  strong {
      color: #fff;
    }
  


.input-container {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.toggle-container {
  margin: 24px 0;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.toggle-box {
  appearance: none;
  width: 32px;
  height: 16px;
  border-radius: 20px;
  background-color: rgba(255, 255, 255, .5);
  cursor: pointer;
  position: relative;}
  
  :checked {
    background-color: #30A2FF;}
    
    ::after {
      transform: translateX(16px);
      transition: .4s ease-in-out;
    }
  
  
  ::after {
    position: absolute;
    content: "";
    top: 3px;
    left: 3px;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    background-color: #fff;
  }


.btn {
  background-color: #30A2FF;
  border: 1px solid #30A2FF;
  width: 350px;
  border-radius: 20px;
  padding: 10px 0;
  color: #fff;
}

    </style>
</head>
<body>

<div class="left-container">
</div>
<div class="right-container">
    <form method="POST">
    <div class="right-container__box">
        <div class="right-container-box">
            <h2 class="right-container__h2">Nice to see you!</h2>
            <p class="right-container__p">Enter your email and password to sign in</p>
        </div>
        <div class="input-container">
            <label for="email" class="right-container__label">Username</label>
            <input type="text" class="right-container__input" name="username" placeholder="Your username">
            <label for="email" class="right-container__label">Password</label>
            <input type="password" class="right-container__input" name="password" placeholder="Your password"> 
        </div> 
        <div class="toggle-container">
          <input type="checkbox" class="toggle-box" name="checkbox">
          <label for="checkbox">Remember me</label>
        </div>
        <button class="btn">SIGN IN</button>
      <p class="right-container__bottom-text">Don't have an account? <strong>Sign Up</strong></p>
    </div>
</form>
</div>
</body>
</html>