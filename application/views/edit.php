EDIT ACCOUNT
<div>
<?php echo $content; ?>
</div>
<form action='<?php echo HTTP_PATH; ?>index/save/<?php echo $user->id; ?>' method='post'>

<p>

<label for='name'>E-mail : </label>

<input type='text' name='email' value="<?php echo $user->email; ?>" />

</p>

<p>

<label for='password'>Password : </label>

<input type='password' name='password' value="<?php echo $user->password; ?>" />

</p>

<p>

<label for='name'>Name : </label>

<input type='text' name='name' value="<?php echo $user->name; ?>" />

</p>

<p>

<input type='submit' name='save' value='Save' />

</p>

</form>