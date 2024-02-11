<?php

namespace Controllers;

use Utils\Request;
use Utils\Database;

class LoginController
{


    public static function loginUser($request)
    {
        $validationSpecs =  [
            "email" => "required:true|regex:/^[A-Za-z-\.]+@([A-Za-z-]+\.)+[\w-]{2,4}$/",
            "password" => "required:true|min:8|max:14",
        ];
        $errors = [];
        foreach ($validationSpecs as $key => $val) {
            $submittedValue = $_POST[$key];
            $specErrors = self::validateValueBySpec($submittedValue, $val);
            if (count($specErrors) > 0) {
                $errors[$key] = $specErrors;
            }
        }
        if (count($errors) > 0) {
            session_start();
            $_SESSION = [];
            $_SESSION["validationErrors"] = $errors;
            header("Location:" . "/login");
            return;
        }
        $databaseConnection = Database::getConnection();
        $prepared_query = $databaseConnection->prepare("SELECT konta_parole FROM darbinieki
                                    WHERE darbinieka_id = ?
                                    OR darbinieka_id = 1000");
        exit();


        if (empty($row)) {
            $_SESSION["validationErrors"] = ["username" => ["Incorrect username or password"]];
            header("Location:" . "/login");
        }
        $databasePassword = $row["konta_parole"];
        $plainSubmittedPassword = $_POST["password"];

        echo $databasePassword . "<br>";
        $password_verified = hash("sha256", $plainSubmittedPassword);
        echo $password_verified;
    }

    public static function validateEntry($key, $value, $checkedValue)
    {
        $errors = [];
        switch ($key) {
            case 'regex':
                $matched = preg_match($value, $checkedValue);
                if (!$matched) {
                    array_push($errors, "The format of this field is not correct");
                }
                break;
            case 'required':
                if ($checkedValue == "") {
                    array_push($errors, "This field is required");
                }
                break;
            case 'min':
                if (strlen($checkedValue) < intval($value)) {
                    array_push($errors, "This field should contain at least $value symbols");
                }
                break;
            case 'max':
                if (strlen($checkedValue) > intval($value)) {
                    array_push($errors, "This field should not exceed $value symbols");
                }
                break;
            default:
                throw new \Exception("Rule $key was not found.");
                break;
        }
        return $errors;
    }

    public static function validateValueBySpec($value, $spec)
    {
        $errors = [];
        $specComponents = explode("|", $spec);
        foreach ($specComponents as $val) {
            $keyVal = explode(":", $val);
            $key = $keyVal[0];
            $val = $keyVal[1];
            $specErorrs = self::validateEntry($key, $val, $value);
            if (count($specErorrs) != 0) {
                array_push($errors, ...$specErorrs);
            }
        }
        return $errors;
    }

    public static function loginPage($request)
    {
        session_start();
        if (in_array("validationErrors", array_keys($_SESSION))) {
            $errors = $_SESSION["validationErrors"];
        } else {
            $errors = [];
        }
        Request::renderTemplate($_REQUEST, "login", ["validationErrors" => $errors]);
    }
}
