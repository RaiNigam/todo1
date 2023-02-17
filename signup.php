<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/0c9a88a792.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9f0469db40.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginout.css">
    <title>Todo - log in or sign up</title>
</head>
<body>
    <main class="container">
        <div class="container">
            <form action="#" class="user-signup">
                <header class="row head">
                    <div class="col">
                        <h1 class="sign-up">Sign Up</h1>
                        <p class="discript">It's quick and easy.</p>
                    </div>
                </header>
                <main class="row row-main">
                    <div class="col col-main">
                        <input class="firstName" type="text" placeholder="First name" name="First name" title="What's your first name?"/>
                        <input class="lastName" type="text" placeholder="Last name" name="last name" title="what's your last name?"/><br/>
                        <input class="Email" type="email" placeholder="Enter your Email" name="email" title="Enter your email ID"/><br/>
                        <input class="Password" type="password" placeholder="New password" name="password" title="Password must be 8 character long"/><br/>
                        <label class="b-day" for="birthday">Birthday <i class="fa-solid fa-circle-question"></i></label><br/>
                        <input class="birthday" type="date" id="birthday" name="birthday"/><br/>
                        <label class="Gender" for="">Gender <i class="fa-solid fa-circle-question"></i></label><br/>
                        <span class="male">
                            <label class="M" for="male">Male</label>
                            <input type="radio" id="male" name="gender" value="male"/>
                        </span>
                        <span class="female">
                            <label class="F" for="female">Female</label>
                            <input type="radio" id="female" name="gender" value="female"/>
                        </span>
                        <span class="others">
                            <label class="O" for="others">Others</label>
                            <input type="radio" id="others" name="gender" value="others"/>
                        </span>
                    </div>
                </main>
                <footer class="row signup-btn">
                    <div class="col">
                        <button type="submit" class="signing-up">Sign Up</button>
                    </div>
                </footer>
            </form>
        </div>
    </main>
</body>
</html>