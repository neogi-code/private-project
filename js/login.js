function check_input()
{
	if(!document.login_form.username.value)
	{
		alert("아이디를 입력하세요");
		document.login_form.username.focus();
		return;
	}
	if(!document.login_form.pass.value)
	{
		alert("비밀번호를 입력하세요");
		document.login_form.pass.focus();
		return;
	}
	document.login_form.submit();
}
