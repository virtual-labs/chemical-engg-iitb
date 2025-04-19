<?php

class users
{
    private $conn;
    private $connect;
    function __construct($con)
    {
        $this->connect = $con;
    }

    private function onlyRead_Function()
    {
        $this->conn = $this->connect->onlyRead_Connection();
    }

    private function onlyAlter_Function()
    {
        $this->conn = $this->connect->onlyAlter_Connection();
    }

    private function onlyUpdate_Function()
    {
        $this->conn = $this->connect->onlyUpdate_Connection();
    }

    public function insertuser($val, $date)
    {
        $this->onlyUpdate_Function();
        mysqli_query($this->conn,"INSERT INTO vle_exp(`eid` ,`name` ,`sys` ,`date`) VALUES ('','Karan Singh Kathiar','$val','$date')");
        mysqli_close($this->conn);
        return 1;
    }

    public function getsrno($val, $date)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT * FROM vle_exp WHERE sys='$val' AND date='$date'");
        mysqli_close($this->conn);
        return $result;
    }

    public function updateeid($eid, $srno)
    {
        $this->onlyUpdate_Function();
        mysqli_query($this->conn,"UPDATE vle_exp SET eid='$eid' WHERE Srno='$srno'");
        mysqli_close($this->conn);
        return 1;
    }

    public function insertvalue($eid,$v1,$v2,$hl,$rix,$riy,$t,$flag)
    {
        $this->onlyUpdate_Function();
        mysqli_query($this->conn,"INSERT INTO vle_data(`eid`, `v1`, `v2`, `hl`, `rix`, `riy`, `t`, `flag`) VALUES ('$eid','$v1','$v2','$hl','$rix','$riy','$t','$flag')");
        mysqli_close($this->conn);
        return 1;
    }

    public function geteid($eid)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT * FROM `vle_data` where eid='$eid'");
        mysqli_close($this->conn);
        return $result;
    }

    public function updateflag($flag,$item)
    {
        $this->onlyUpdate_Function();
        mysqli_query($this->conn,"UPDATE vle_data SET flag='$flag' WHERE Srno='$item'");
        mysqli_close($this->conn);
        return 1;
    }

    public function getedata($eid, $flag)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT * FROM `vle_data` where eid='$eid' and flag='$flag'");
        mysqli_close($this->conn);
        return $result;
    }

    public function getexpeid($eid)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT * FROM `vle_exp` where eid='$eid'");
        mysqli_close($this->conn);
        return $result;
    }

    public function insertvaluecalib($eid,$v1,$v2,$ri)
    {
        $this->onlyUpdate_Function();
        mysqli_query($this->conn,"INSERT INTO vle_calib(`eid` ,`v1` ,`v2` ,`ri`) VALUES ('$eid','$v1','$v2','$ri')");
        mysqli_close($this->conn);
        return 1;
    }

    public function getcalibdata($eid)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT * FROM `vle_calib` where eid='$eid'");
        mysqli_close($this->conn);
        return $result;
    }

    public function updatevledata($x,$y,$g1log,$g2log,$ge,$gy,$Srno)
    {
        $this->onlyUpdate_Function();
        mysqli_query($this->conn,"UPDATE vle_data SET x='$x',y='$y',g1log='$g1log',g2log='$g2log', ge='$ge', gy='$gy' WHERE Srno='$Srno'");
        mysqli_close($this->conn);
        return 1;
    }

    public function getvlexdata($eid,$qrgy)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT x , gy FROM vle_data WHERE eid='$eid' AND gy <= '$qrgy' ORDER BY x ASC");
        mysqli_close($this->conn);
        return $result;
    }

    public function getvlexdatamore($eid,$qrgy)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT x , gy FROM vle_data WHERE eid='$eid' AND gy > '$qrgy' ORDER BY x ASC");
        mysqli_close($this->conn);
        return $result;
    }

    public function getvlexdatacount($eid,$qrgy)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT COUNT(x) AS cntx FROM vle_data WHERE eid='$eid' AND gy <= '$qrgy' ORDER BY x ASC");
        mysqli_close($this->conn);
        return $result;
    }

    // public function getvlexdatamorecount($eid,$qrgy)
    // {
    //     $this->onlyRead_Function();
    //     $result = mysqli_query($this->conn,"SELECT count(x), gy FROM vle_data WHERE eid='$eid' AND gy > '$qrgy' ORDER BY x ASC");
    //     mysqli_close($this->conn);
    //     return $result;
    // }

    public function getvlexdatamorecount($eid,$qrgy)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT count(x), gy FROM vle_data WHERE eid='$eid' AND gy > '$qrgy' GROUP BY gy");
        mysqli_close($this->conn);
        return $result;
    }

    public function getxgle($eid)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT x , ge FROM vle_data WHERE eid='$eid' ORDER BY x ASC");
        mysqli_close($this->conn);
        return $result;
    }

    public function getcntxcount($eid)
    {
        $this->onlyRead_Function();
        $result = mysqli_query($this->conn,"SELECT COUNT(x) AS cntx FROM vle_data WHERE eid='$eid' ORDER BY x ASC");
        mysqli_close($this->conn);
        return $result;
    }

}
?>
