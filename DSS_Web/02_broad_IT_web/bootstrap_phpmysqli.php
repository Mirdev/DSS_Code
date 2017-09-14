<!DOCTYPE html>
<html lang="ko">
<!-- (설명) HTML 언어로 작성되어 있다는 점을 알려줌 -->

<head>
    <!-- HTML 파일 관련 정보를 알려줌 -->
    <meta charset="utf-8">
    <!--(설명) IE로 접속했을 때 IE 최신 표준 모드로 렌더링 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--(설명) 반응형 디자인을 위한 viewport 설정 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap | Layout</title>
    <!--(설명) bootstrap.min.css 연결 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--(설명) IE 9 미만 버전에서 HTML5와 media query 지원을 위한 호환 스크립트 설정 -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <!-- 문서 본문 내용이 시작됨을 알려줌 -->
    <div class="container">
        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Recent IT Articles</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">About Dave Lee</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Contact Dave Lee</a></li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <!-- <div class="col-sm-6 col-md-3"></div> -->
            <!-- <div class="col-sm-6"></div> -->
            <!-- <div class="col-md-3"></div>  -->
            <!-- Jumbotron -->
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Comment Number</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                            $mysqli = new mysqli("localhost", 'root', 'korea123', 'example');
                            $errnum = mysqli_connect_errno();
                            if ($errnum)    
                            {
                                $errmsg = mysqli_connect_error();       
                                echo "Connect failed. error number=$errmsg";        
                                exit();     
                            }
                            $petquery = "SELECT * FROM posts";
                            $result = $mysqli->query($petquery) or die ($mysqli->error);
                            $count=$result->num_rows;

                            if ($count > 0)
                            {   
                                while ($row = mysqli_fetch_object($result))
                                {
                                    echo '<tr><td>'.$row->title.'</td><td>'.$row->hit.'</td></tr>';
                                }
                                mysqli_free_result($result);
                            } 
                            $mysqli->close(); 
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- 
            body 내에 script는 body 마지막에 위치하는 것이 좋다. 
            HTML로 화면 로딩을 먼저 한 후에 script가 실행되기 때문이다.
            body 로드 전 실행이 필요한 script는 head에 위치해야 한다.
        -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
