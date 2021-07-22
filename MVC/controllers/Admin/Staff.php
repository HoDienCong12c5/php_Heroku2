<?php
class Staff extends Controller
{
    public function _construct()
    {
        require_once "MVC/models/Admin/StaffkModel.php";
        $this->model = new StaffModel();
    }
    public function index()
    {
        $f = $this->modelAdmin("StaffModel");
        $this->viewAdmin('Staffview', [
            "data" => $f->getStaff(),
            "partTime" => $f->PartTime()
        ]);
    }
    function currency_format($number, $suffix = '  VNĐ')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
    public function ViewStaff() {
        $f = $this->modelAdmin("StaffModel");
        $data = $f->getStaff();
        $i = 0;
        if ($data) {
            while ($r = mysqli_fetch_array($data)) {
                $sex = $r[5] == 0 ? 'nam' : 'nữ';
                $luong = $this->currency_format($r[6]);
                echo "<tr>
                            <td><div id='idp$r[0]'>$r[0]</div></td>
                            <td>$r[1]</td>
                            <td>$r[2]</td>
                            <td>$r[3]</td>
                            <td>$r[4]</td>
                            <td>$sex</td>
                            <td>$luong</td>
                            <td>$r[7]</td>
                            <td >
                                <button data-bs-toggle='modal' data-bs-target='#exampleModal' ><a class='me-3 text-lg text-success' href='javascript:Edit($r[0],$i)' ><i class='far fa-edit'></i></a></button>
                                <button><a class='text-lg text-danger' href='javascript:Delete($r[0],$i)'><i class='far fa-trash-alt'></i></a></button>
                            </td>
                        </tr>";
                $i++;
            }
        }
    }
    public function StaffDetail(){
        $idP = $_POST['idP'];
        $f = $this->modelAdmin("StaffModel");
        $idW = $f->IDPartTime($idP);
        $data = $f->PartTime();
        $salary = $this->currency_format($f->getSalary($idW));
        echo " <tr>
                    <td>Tên công việc :</td>
                <td>";
        echo "<select class='form-select' name='form-select' id='form-select'>";
        while ($r = mysqli_fetch_array($data)) {
            if ($r[0] == $idW) {
                echo "
                        <option selected value='$r[0]'>$r[1] </option>
                    ";
            } else {
                echo "
                        <option value='$r[0]'>$r[1] </option>
                    ";
            }
        }

        echo "</select>";
        echo "<br>";
        echo "</td>
            </tr>";
        echo "<td>Lương :</td>
                <td>
                    <div><b><div id='Salary' >$salary</div></b></div>
                </td>
            </tr>";
    }
    public function SelectWork() {
        $idW = $_POST['idW'];
        $f = $this->modelAdmin("StaffModel");
        $salary = $this->currency_format($f->getSalary($idW));
        echo $salary;
    }
    public function Delete(){
        $idP = $_POST['id'];
        $f = $this->modelAdmin("StaffModel");
        $f->Delete($idP);
    }
    public function Update(){
        $idW = $_POST['idW'];
        $idP = $_POST['idP'];
        $f = $this->modelAdmin("StaffModel");
        $f->Update($idP,$idW);
    }
    public function Search(){
        $idTy = $_POST['idTy']; 
        $f = $this->modelAdmin("StaffModel");
        $data = $f->SearchIDW($idTy);
        $i = 0;
        if ($data) {
            while ($r = mysqli_fetch_array($data)) {
                $sex = $r[5] == 0 ? 'nam' : 'nữ';
                $luong = $this->currency_format($r[6]);
                echo "<tr>
                            <td><div id='idp$r[0]'>$r[0]</div></td>
                            <td>$r[1]</td>
                            <td>$r[2]</td>
                            <td>$r[3]</td>
                            <td>$r[4]</td>
                            <td>$sex</td>
                            <td>$luong</td>
                            <td>$r[7]</td>
                            <td >
                                <button data-bs-toggle='modal' data-bs-target='#exampleModal' ><a class='me-3 text-lg text-success' href='javascript:Edit($r[0],$i)' ><i class='far fa-edit'></i></a></button>
                                <button><a class='text-lg text-danger' href='javascript:Delete($r[0],$i)'><i class='far fa-trash-alt'></i></a></button>
                            </td>
                        </tr>";
                $i++;
            }
        }
        else
            echo "không có dữ liệu";
    }
}
