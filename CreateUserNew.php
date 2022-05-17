<!Doctype html>

<head>
    <link rel="stylesheet" type="text/css" href="CreateUserNew.css">
</head>

<body>
    <div class="createusermain">
        <div class="left">
            <img src="user.jpg" class="createuserimg">
        </div>
        <div class="right">
            <div class="container">
                <div class="screen">
                    <div class="screen-header">
                        <div class="screen-header-right">
                            <div class="screen-header-ellipsis"></div>
                            <div class="screen-header-ellipsis"></div>
                            <div class="screen-header-ellipsis"></div>
                        </div>
                    </div>
                    <div class="screen-body">

                        <div class="screen-body-item">
                            <form class="app-form" method="post">
                                <div class="app-form-group">
                                    <input class="app-form-control" placeholder="NAME" type="text" name="name" required>
                                </div><br>
                                <div class="app-form-group">
                                    <input class="app-form-control" placeholder="EMAIL" type="email" name="email"
                                        required>
                                </div><br>
                                <div class="app-form-group">
                                    <input class="app-form-control" placeholder="BALANCE" type="number" name="balance"
                                        required>
                                </div><br>

                                <div class="app-form-group button">
                                    <input class="app-form-button" type="submit" value="CREATE" name="submit"></input>
                                    <input class="app-form-button" type="reset" value="RESET" name="reset"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>