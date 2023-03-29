<?php
 ?>
<form method="post" action="">
    <div><label for="username">Username:</label> <input type="text" id="username" name="username" /></div>
    <div><label for="userpass">Password:</label> <input type="password" id="userpass" name="userpass"></div>
    <div><label for="userpasscheck">Password again: </label> <input type="password" id="userpasscheck" name="userpasscheck"></div>
    <div><label for="dob">Date of Birth:</label><input type="date" id="dob" name="dob"
                                                       value=""
                                                       min="1940-01-01" max="2012-12-31"></div>
    <div><label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="">Please select one…</option>
            <option value="female">Female</option>
            <option value="male">Male</option>
            <option value="unknown">Perfer not to Answer</option>
        </select>
    <div><input type="submit" value="Create Account" /></div>
</form>
