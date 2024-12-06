
<style>

    .form-edit {
        position: fixed;
        inset: 0;
        background-color: rgba(0, 0, 0,0.5);
        z-index: 99;
        padding: 20px;
        backdrop-filter: blur(5px);
    }

</style>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Thông Tin Cá Nhân</h3>
                </div>
                <div class="card-body" id="renderProfile">
                    <div class="form-group">
                        <label><strong>Họ và tên:</strong></label>
                        <p id="fullname"></p>
                    </div>
                    <div class="form-group">
                        <label><strong>Email:</strong></label>
                        <p id="email"></p>
                    </div>
                    <div class="form-group">
                        <label><strong>Số điện thoại:</strong></label>
                        <p id="phone"></p>
                    </div>
                    <div class="form-group">
                        <label><strong>Địa chỉ:</strong></label>
                        <p id="address"></p>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-success" id="btnInfo">Chỉnh sửa thông tin</button>
                    <button class="btn btn-success" id="btnPass">Thay đổi mật khẩu</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="box-form-edit"></div>
<div id="box-edit-password"></div>


<script>

    let user = null;

    const btnEditInfo = document.getElementById('btnInfo');
    const btnEditPass = document.getElementById('btnPass');
    btnEditInfo.addEventListener('click',function(){
        edit();
    });

    btnEditPass.addEventListener('click',function(){
        editPassword();
    });

    getProfile();
    function getProfile(){
        const url = `profile/getprofile`;
        fetch(url)
        .then(res => res.json())
        .then(data => {
            user = data;
            renderProfile(data);
        })
        .catch(err => console.log(err));
    }

    function renderProfile(data){
        console.log(data);
        const box = document.getElementById('renderProfile');
        const newBox = document.createElement('div');
        newBox.id = 'renderProfile';
        newBox.classList.add('card-body');
        newBox.innerHTML = `
                    <div class="form-group">
                        <label><strong>Họ và tên:</strong></label>
                        <p id="fullname">${data?.fullname || ''}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Email:</strong></label>
                        <p id="email">${data?.email}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Số điện thoại:</strong></label>
                        <p id="phone">${data?.phonename || ''}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Địa chỉ:</strong></label>
                        <p id="address">${data?.address || ''}</p>
                    </div>
        `;
        box.replaceWith(newBox);
    }

    function edit(){
        if(!user) return;
        const box = document.getElementById('box-form-edit');
        const newBox = document.createElement('div');
        newBox.id = 'box-form-edit';
        newBox.innerHTML = `
        <div class="form-edit">
        <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Chỉnh Sửa Thông Tin Cá Nhân</h3>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="fullname">Họ và tên:</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập họ và tên" value="${user?.fullname || ''}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="${user?.phonename || ''}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ:</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" rows="3" required>${user?.address || ''}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Lưu Thay Đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
        `;
        box.replaceWith(newBox);
        const card = newBox.querySelector('.card');
        // close form
        newBox.onclick = function (e){
            if(!card.contains(e.target)){
                newBox.replaceWith(box);
            }
        }
        const form = newBox.querySelector('form');
        form.onsubmit = function(e){
            e.preventDefault();
            const phoneRegex = /^(0|\+84)[1-9][0-9]{8}$/;

            const fullname = form.fullname.value;
            const phone = form.phone.value;
            const address = form.address.value;

            if(!phoneRegex.test(phone)){
                toast({
                    title: 'Số điện thoại không hợp lệ',
                    message: 'Vui lòng nhập số điện thoại hợp lệ',
                    type: 'fail'
                })
                console.log('Số điện thoại không hợp lệ');
                return;
            }
            const data = {
                fullname,
                phone,
                address
            }

            const url = `profile/editprofile`;
            fetch(url,{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(data => {
                if(data.error){
                    toast({
                        title: 'Error',
                        message: data.error,
                        type: 'fail'
                    })
                }else{
                    toast({
                        title: 'Success',
                        message: data.success,
                        type: 'success'
                    })
                    getProfile();
                    newBox.replaceWith(box);
                }
            })
            .catch(err => console.log(err));
        }
    }

    function editPassword(){
        const box = document.getElementById('box-edit-password');
        const newBox = document.createElement('div');
        newBox.id = 'box-edit-password';
        newBox.innerHTML = `
        <div class="form-edit">
        <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Thay đổi mật khẩu</h3>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="">Mật khẩu cũ:</label>
                            <input type="password" class="form-control pass" id="fullname" name="oldpass" placeholder="Nhập mật khẩu cũ" required>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu mới:</label>
                            <input type="password" class="form-control pass" id="" name="newpass" placeholder="Nhập mật khẩu" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu:</label>
                            <input type="password" class="form-control pass" id="" name="confrimpass" placeholder="Nhập lại mật khẩu" required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="" id="showpass">
                            <label for="showpass">Hiển thị</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Lưu Thay Đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
        `;
        box.replaceWith(newBox);
        const card = newBox.querySelector('.card');
        newBox.onclick = function (e){
            if(!card.contains(e.target)){
                newBox.replaceWith(box);
            }
        }

        const showpass = newBox.querySelector('#showpass');
        showpass.onchange = function(){
            const pass = newBox.querySelectorAll('.pass');
            pass.forEach(item => {
                if(showpass.checked){
                    item.type = 'text';
                }else{
                    item.type = 'password';
                }
            })
        }

        const form = newBox.querySelector('form');
        form.onsubmit = function(e){
            e.preventDefault();
            let oldpass = form.oldpass.value;
            oldpass = oldpass.trim();
            let newpass = form.newpass.value;
            newpass = newpass.trim();
            let confrimpass = form.confrimpass.value;
            confrimpass = confrimpass.trim();
            if(newpass != confrimpass){
                toast({
                    title: 'Error',
                    message: 'Mật khẩu không trùng khớp',
                    type: 'fail'
                })
                return;
            }
            const data = {
                oldpass,
                newpass
            }
            const url = `profile/changepassword`;
            fetch(url,{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(data => {
                if(data.error){
                    toast({
                        title: 'Error',
                        message: data.error,
                        type: 'fail'
                    })
                }else{
                    toast({
                        title: 'Success',
                        message: 'Thay đổi mật khẩu thành công',
                        type: 'success'
                    })
                    newBox.replaceWith(box);
                }
            })
            .catch(err => console.log(err));
        }
    }

</script>
