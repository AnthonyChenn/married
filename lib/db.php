<?php
function db_open(){
    try {
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=married', 'root', 'Kid95400');
        $dbh->exec('SET NAMES UTF8');
        return $dbh;
    } catch (PDOException $e) {
        return FALSE;
    }
}

function db_close($dbh){
    $dbh = NULL;
}

function db_insert_obj($dbh, $table, $obj) {

    $sql = "INSERT INTO $table (";
    $sql_post = '';
    foreach ($obj as $k => $v) {
        $sql =  $sql . $k .', ';
        $sql_post = $sql_post . ':' . $k . ', ';
        $obj[':'.$k] = $v;
        unset($obj[$k]);
    }

    $sql = substr($sql,0,-2) . ') VALUES (' . substr($sql_post,0,-2) . ')';

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $sth = $dbh->prepare($sql);
    } catch (PDOException $e) {
        return $e->getMessage();
    }

    try {
        $sth->execute($obj);
    } catch (PDOException $e) {
        return $e->getMessage();
    }
    return TRUE;
}

function db_insert_obj_wret($dbh, $table, $obj) {
    if (isset($obj['id'])) {
        unset($obj['id']);
    }

    $ret = array('stat'=>'ok','data'=>'');
    $sql = "INSERT INTO $table (";
    $sql_post = '';
    foreach ($obj as $k => $v) {
        $sql =  $sql . $k .', ';
        $sql_post = $sql_post . ':' . $k . ', ';
        $obj[':'.$k] = $v;
        unset($obj[$k]);
    }
    $sql = substr($sql,0,-2) . ') VALUES (' . substr($sql_post,0,-2) . ')';

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    try {
        $sth = $dbh->prepare($sql);
    } catch (PDOException $e) {
        $ret['stat'] = 'error';
        $ret['data'] = $e->getMessage();
        return $ret;
    }

    try {
        $sth->execute($obj);
    } catch (PDOException $e) {
        $ret['stat'] = 'error';
        $ret['data'] = $e->getMessage();
        return $ret;
    }

    $ret['data'] = $dbh->lastInsertId();
    return $ret;
}

function db_exec($dbh,$sql,$params=array()){
  $sth = $dbh -> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth -> execute($params);
  return $sth -> fetchall();
}

?>
