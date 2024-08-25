<?php


function logAuditTrail($auditTrailData, $conn)
{
    $timestamp = $auditTrailData['timestamp'];
    $user_id = $auditTrailData['user_id'];
    $action = $auditTrailData['action'];
    $affectedTable = $auditTrailData['affected_table'];
    $affectedRowId = $auditTrailData['affected_row_id'];
    $ipAddress = $auditTrailData['ip_address'];
    $additionalInfo = $auditTrailData['additional_info'];

    $sql = "INSERT INTO audit_trail (user_id, action, affected_table, affected_row_id, ip_address, info) 
            VALUES ('$user_id', '$action', '$affectedTable', '$affectedRowId', '$ipAddress', '$additionalInfo')";

    mysqli_query($conn, $sql);
}

function usernameExists($conn, $username)
{
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?signup&error=failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function login($conn, $username, $password)
{
    $usernameExists = usernameExists($conn, $username);

    if ($usernameExists === false) {
        header("location: ../login.php?error=invalid_username&showNotis");
        exit();
    }

    $pwdHashed = $usernameExists["user_password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?login&error=invalid_password&showNotis");
        exit();
    } else if ($checkPwd === true) {
        if ($usernameExists['role'] == 'admin') {
            session_start();
            $_SESSION["admin_id"] = $usernameExists["user_id"];
            $_SESSION["admin"] = $usernameExists["username"];
            $_SESSION["admin_email"] = $usernameExists["user_email"];
            header("location: ../");
            exit();
        } else {
            header("location: ../../");
            exit();
        }
    }
}


function changePassword($conn, $username, $current, $new)
{
    $usernameExists = usernameExists($conn, $username);

    $pwdHashed = $usernameExists["user_password"];
    $checkPwd = password_verify($current, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../user-profile.php?error=invalid_current_password&showNotis");
        exit();
    } else {
        $newHashed = password_hash($new, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET user_password = '$newHashed' ";
        if (mysqli_query($conn, $sql)) {
            header("location: ../user-profile.php?error=none&showblueNotis");
            exit();
        }
    }
}


// fetching apartment data

function getRecentApartments($conn)
{

    $recent = isset($_GET['recent']) ? $_GET['recent'] : 'today';

    $sql = "SELECT a.*, u.username 
    FROM apartments a
    JOIN users u ON a.owned_by = u.user_id";

    if ($recent === 'today') {
        $sql .= " WHERE DATE(a.created) = CURDATE()";
    } elseif ($recent === 'month') {
        $sql .= " WHERE YEAR(a.created) = YEAR(CURDATE()) AND MONTH(a.created) = MONTH(CURDATE())";
    } elseif ($recent === 'year') {
        $sql .= " WHERE YEAR(a.created) = YEAR(CURDATE())";
    }

    $result = mysqli_query($conn, $sql);

    $apartments = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $apartments[] = $row;
        }
    }
    return $apartments;
}
