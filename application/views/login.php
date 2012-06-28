LOGIN
<div>
<?php echo $content; ?>
</div>
<form action='<?php echo HTTP_PATH; ?>secure/authenticate' method='post'>

<p>

<label for='name'>E-mail : </label>

<input type='text' name='email' />

</p>

<p>

<label for='password'>Password : </label>

<input type='password' name='password' />

</p>

<p>

<input type='submit' name='login' value='Login' />

</p>

</form>