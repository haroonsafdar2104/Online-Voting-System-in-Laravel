<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Online Voting System</title>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-register {
            background-color: #dc3545;
            margin-left: 10px;
        }

        .btn-register:hover {
            background-color: #b30019;
        } */



        * {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}
.container {
    height: 100vh;
    width: 100%;
    background-image: url(bg.png);
    background-position: center;
    background-size: cover;
    padding-right: 3%;
    padding-left: 5%;
    box-sizing: border-box;
    /* position: relative; */
}
.header {
    width: 100%;
    height: 15vh;
    margin: auto;
    display: flex;
    align-items: center;
}
.logo {
    width: 100px;
    margin-top: 10px;
    cursor: pointer;
}
nav {
    flex: 1;
    padding-left: 450px;
}
nav ul li {
    display: inline-block;
    list-style: none;
    margin: 0 15px;
}
nav ul li a {
    text-decoration: none;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    font-size: 15px;
    font-weight: 600;
}
#btn1 {
    text-transform: uppercase;
    background: linear-gradient(to bottom, #378de5 3%, #48789b 100%);
    border-radius: 30px;
    border: 1px solid #5e97d1;
    cursor: pointer;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-size: 17px;
    font-weight: 700;
    padding: 12px 20px;
    margin: 10px;
    text-decoration: none;
    box-shadow: 1px 4px 12px rgba(94,28,68,.15);
    text-shadow: 0px 1px 0px #528ecc;
}
#btn2 {
    text-transform: uppercase;
    background: linear-gradient(to bottom, #cbcbcb 2%, #fff 100%);
    border-radius: 30px;
    border: 1px solid #cbcbcb;
    cursor: pointer;
    color: #5e97d1;
    font-family: 'Poppins', sans-serif;
    font-size: 17px;
    font-weight: 700;
    padding: 12px 20px;
    margin: 10px;
    text-decoration: none;
    box-shadow: 1px 4px 12px rgba(94,28,68,.15);
    text-shadow: 0px 1px 0px #cbcbcb;
}
.btn:hover {
    box-shadow: 3px 8px 22px rgba(94,28,68,.15);
    transform: scale(1.1);
    transition: .2s ease-in-out;
}
.content {
    position: relative;
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: space-between;
}
.content .text {
    position: relative;
    max-width: 600px;
}
.content .text h1 {
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    font-weight: 800;
    margin-top: 80px;
    line-height: 1.5em;
    letter-spacing: .1em;
    font-size: 40px;
    color: #fff;
}
.content .text h1 span {
    font-size: 50px;
}
.content .text p {
    font-size: 17px;
    font-weight: 600;
    letter-spacing: .1em;
    margin-top: 40px;
    color: #e7e3e3;
 }
.btn3 {
    background: linear-gradient(to bottom, #cbcbcb 2%, #fff 100%);
    margin-top: 60px;
    margin-left: 140px;
    padding: 15px 30px;
    text-align: center;
    transition: .5s;
    border: none;
    outline: none;
    text-transform: uppercase;
    color: #1b1b1b;
    font-size: 20px;
    font-weight: 700;
    border-radius: 30px;
    box-shadow: 1px 4px 12px rgba(94,28,68,.15);
}
.pepsi {
    display: flex;
    height: 110%;
    position: absolute;
    width: 1100px;
    margin-top: 100px;
    padding-left: 440px;
    justify-content: flex-end;
}

    </style>
</head>
<body>
    <!-- <div class="container">
        <div class="card">
            <h2 class="card-title">Welcome to the Online Voting System</h2>
            <div>
                <a href="/login" class="btn">Login</a>
                <a href="/registration" class="btn btn-register">Register</a>
            </div>
        </div>
    </div> -->

    <div class="container">
        <div class="header">
            <img src="gy.png" alt="" class="logo">
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">Community</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </nav>
            <button onclick="window.location.href='/login';" class="btn" id="btn1">Log In</button>
            <button onclick="window.location.href='/register';" class="btn" id="btn2">Sign Up</button>
        </div>
        <div class="content">
            <div class="text">
            <h1>Online Voting  <br> <span>System</span></h1>
            <p>An online voting system is a digital platform that enables individuals to cast their votes electronically through the internet. It provides an alternative to traditional paper-based voting methods and aims to make the voting process more convenient, accessible, and efficient.
            </p>
            <button class="btn3">Learn More</button>
           </div>
        <div class="pepsi">
        <img src="gy.png" alt="">
        </div>
       </div>
   </div>

</body>
</html>
