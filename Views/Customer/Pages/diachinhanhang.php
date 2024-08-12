<style>
    .form-group {
        padding: 10px;
    }
    .error {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: var(--bs-form-invalid-color);
    }
    .error-name, .error-phone, .error-email {
        display: none;
    }
</style>

<div class="account-info">
    <h5>Địa chỉ nhận hàng</h5>
    <div class="row">
        <div class="col-6" style="border-right: 1px solid #eaeaea;">
            <input type="text" hidden name="id" id="id" value="<?php echo $data['User']['MaKH'] ?>">
            <div class="form-group">
                <label for="city">Tỉnh/Thành phố</label>
                <select class="form-select" id="city">
                    <option value="" hidden selected>Chọn tỉnh thành</option>
                </select>
            </div>
                    
            <div class="form-group">
            <label for="city">Quận/Huyện</label>
                <select class="form-select" id="district" disabled>
                    <option value="" hidden selected>Chọn quận huyện</option>
                </select>
            </div>

            <div class="form-group">
                <label for="city">Phường xã</label>
                <select class="form-select" id="ward" disabled>
                    <option value="" hidden selected>Chọn phường xã</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sonha">Địa chỉ cụ thể</label>
                <input type="text" placeholder="Địa chỉ nhà" class="form-control" id="sonha" name="sonha">
            </div>
        </div>
    </div>
    <button class="btn btn-primary" id="saveaddress">Lưu thay đổi</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
	var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var diachi =document.getElementById('sonha');
var Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
  method: "GET", 
  responseType: "application/json", 
};
var promise = axios(Parameter);
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }
  citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if(this.value != ""){
      const result = data.filter(n => n.Id === this.value);
        districts.disabled = false;
      for (const k of result[0].Districts) {
        district.options[district.options.length] = new Option(k.Name, k.Id);
      }
    }
  };
  district.onchange = function () {
    ward.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
        ward.disabled = false;
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}
</script>

<script>
    document.getElementById('saveaddress').addEventListener('click', function(e) {
        citis =document.getElementById('city');
        districts =document.getElementById('district');
        ward =document.getElementById('ward');
        sonha =document.getElementById('sonha');
        id = document.getElementById('id').value;
        if(validateData(citis, districts, ward, sonha)) {
          const info = sonha.value + "," + ward.options[ward.selectedIndex].text + "," + districts.options[districts.selectedIndex].text + "," + citis.options[citis.selectedIndex].text;
          $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/Account/updateAddress",
            data: JSON.stringify({
              id: id,
              address: info,
            }),
            dataType: "JSON",
            success: function (response) {
              if(response.status === 200) {
                alert("Thay đổi địa chỉ thành công");
                location.reload();
              }
            }, error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        }
    })
    function validateData(citis, districts, ward, sonha) {
      var flag = 0;
        if(citis.value == "") {
            flag = 1
        }
        if(districts.value == "") {
          flag = 1
        }
        if(ward.value == "") {
          flag = 1;
        }
        if(!sonha || sonha.value.length <= 0) {
          flag = 1;
        }
        if(flag == 0) {
          return true;
        } else return false;
    }
</script>
