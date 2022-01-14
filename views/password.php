<?php

echo "obeauch@gmail.com : " . password_hash("1234", PASSWORD_DEFAULT) . "<br>";

echo "peter@gmail.com : " . password_hash("abcd", PASSWORD_DEFAULT);
