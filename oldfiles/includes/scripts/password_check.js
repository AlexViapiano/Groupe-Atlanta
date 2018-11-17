function verify_passwords(password1, password2)
{
	var junk_output;

		md5hash(password1, document.forms.md5_password.password_md5, junk_output);
		md5hash(password2, document.forms.md5_password.passwordconfirm_md5, junk_output);

		return true;

}

function hash_passwords(currentpassword, currentpassword_md5, newpassword, newpassword_md5, newpasswordconfirm, newpasswordconfirm_md5)
{
	var junk_output;
	md5hash(currentpassword, currentpassword_md5, junk_output, 0);
	// do various checks
	if (newpassword.value != '')
	{
		md5hash(newpassword, newpassword_md5, junk_output, 0);
	}
	if (newpasswordconfirm.value != '')
	{
		md5hash(newpasswordconfirm, newpasswordconfirm_md5, junk_output, 0);
	}
}