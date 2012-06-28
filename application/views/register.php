REGISTER
<div>
<?php echo $content; ?>
</div>
<form action='<?php echo HTTP_PATH; ?>index/create' method='post'>

<p>

<label for='name'>E-mail : </label>

<input type='text' name='email' />

</p>

<p>

<label for='password'>Password : </label>

<input type='password' name='password' />

</p>

<p>

<label for='name'>Name : </label>

<input type='text' name='name' />

</p>

<p>

<input type='submit' name='register' value='Register' />

</p>

</form>