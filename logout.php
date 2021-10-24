<?php
    session_start();
    $_SESSION = array();
    echo "<script>alert('로그아웃 되었습니다 로그인 화면으로 돌아갑니다.'); location.href = 'index.html';</script>"
?>