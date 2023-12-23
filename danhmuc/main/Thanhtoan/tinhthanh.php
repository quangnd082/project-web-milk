<div>
    <label for="city"><i class="fa fa-institution"></i> Tỉnh</label>
    <select class="form-select form-select-sm mb-3" id="city" name = "city" aria-label=".form-select-sm">
        <option value="" selected>Chọn tỉnh thành</option>
    </select>
    <label for="city"><i class="fa fa-institution"></i> Quận/Huyện</label>
    <select class="form-select form-select-sm mb-3" id="district" name = "district" aria-label=".form-select-sm">
        <option value="" selected>Chọn quận huyện</option>
    </select>
    <label for="city"><i class="fa fa-institution"></i> Phường/Xã</label>
    <select class="form-select form-select-sm" id="ward" name = "ward" aria-label=".form-select-sm">
        <option value="" selected>Chọn phường xã</option>
    </select>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
    for (const x of data) {
        citis.options[citis.options.length] = new Option(x.Name, x.Name); // Sử dụng x.Name thay vì x.Id
    }
    citis.onchange = function() {
        districts.length = 1;
        wards.length = 1;
        if (this.value != "") {
            const result = data.filter(n => n.Name === this.value); // Sử dụng n.Name thay vì n.Id

            for (const k of result[0].Districts) {
                districts.options[districts.options.length] = new Option(k.Name, k.Name); // Sử dụng k.Name thay vì k.Id
            }
        }
    };
    districts.onchange = function() {
        wards.length = 1;
        const dataCity = data.filter((n) => n.Name === citis.value);
        if (this.value != "") {
            const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

            for (const w of dataWards) {
                wards.options[wards.options.length] = new Option(w.Name, w.Name); // Sử dụng w.Name thay vì w.Id
            }
        }
    };
}

    function validateForm() {
        var fname = document.getElementById("fname").value;
        var email = document.getElementById("email").value;
        var adr = document.getElementById("adr").value;
        var phone = document.getElementById("phone").value;
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var errorMessage = "";

        if (fname === "") {
            errorMessage += "Vui lòng điền Họ và tên.\n";
        }
        if (citis.value === "" || districts.value === "" || wards.value === "") {
            errorMessage += "Vui lòng chọn Tỉnh thành, Quận huyện và Thị xã trước khi gửi.\n";
        }
        if (email === "") {
            errorMessage += "Vui lòng điền Email.\n";
        } else if (!validateEmail(email)) {
            errorMessage += "Địa chỉ email không hợp lệ.\n";
        }

        if (adr === "") {
            errorMessage += "Vui lòng điền Địa chỉ cụ thể.\n";
        }

        if (phone === "") {
            errorMessage += "Vui lòng điền Số điện thoại.\n";
        }

        if (errorMessage !== "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage,
            });
            return false;
        }

        return true;
    }

    // Hàm kiểm tra định dạng email
    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }



</script>