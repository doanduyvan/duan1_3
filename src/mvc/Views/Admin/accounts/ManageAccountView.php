<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #eef2f7;
    margin: 0;
    padding: 0;
    color: #333;
}

.container-fluid {
    padding: 20px;
}

.dashboard-header {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 25px;
    margin-bottom: 30px;
}

.dashboard-header h1 {
    font-size: 2.2rem;
    color: #4a90e2;
    font-weight: bold;
    margin-bottom: 8px;
}

.dashboard-header p {
    font-size: 1rem;
    color: #7b8a97;
    margin-bottom: 0;
}

.table-container {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.table th, .table td {
    text-align: left;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f8f9fa;
    color: #333;
    font-weight: bold;
}

.table tr:hover {
    background-color: #f1f1f1;
}
</style>

<section class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="dashboard-header">
                <h1>Quản lý Tài Khoản </h1>
                <p>Danh sách tài khoản được hiển thị tại đây</p>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody id="body_account">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>

    const arrAccount = <?php echo json_encode($accounts); ?>;
    console.log(arrAccount);

    renderAccount(arrAccount);
    function renderAccount(data){
        const tbody = document.createElement('tbody');
        tbody.id = 'body_account';
        data.forEach(item => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${item.fullname}</td>
                <td>${item.email}</td>
                <td>Quản trị viên</td>
                <td>${item?.created_at || ''}</td>
            `;
            tbody.appendChild(tr);
        });
        document.querySelector('#body_account').replaceWith(tbody);
    }

</script>