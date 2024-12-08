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

.card {
    border: none;
    border-radius: 12px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-7px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.card-body {
    padding: 25px;
    text-align: center;
}

.card-title {
    font-size: 1.4rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #4a4a4a;
}

.card-text {
    font-size: 1rem;
    margin-bottom: 20px;
    color: #6c757d;
}

.btn {
    border-radius: 6px;
    padding: 10px 20px;
    font-size: 0.95rem;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.btn-primary {
    background-color: #4a90e2;
    color: #ffffff;
    border: none;
}

.btn-success {
    background-color: #5cb85c;
    color: #ffffff;
    border: none;
}

.btn-warning {
    background-color: #f0ad4e;
    color: #ffffff;
    border: none;
}

.btn-danger {
    background-color: #d9534f;
    color: #ffffff;
    border: none;
}

.text-center {
    text-align: center !important;
}

.mb-4 {
    margin-bottom: 1.5rem !important;
}
</style>

<section class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="dashboard-header">
                <h1>Quản lý Thiết Bị Điện Tử</h1>
                <p>Dễ dàng theo dõi sản phẩm, đơn hàng, và người dùng</p>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sản phẩm</h5>
                            <p class="card-text">Quản lý các sản phẩm điện tử của bạn.</p>
                            <a href="#" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Đơn hàng</h5>
                            <p class="card-text">Theo dõi và xử lý đơn hàng một cách nhanh chóng.</p>
                            <a href="#" class="btn btn-success">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thương hiệu</h5>
                            <p class="card-text">Quản lý các thương hiệu uy tín.</p>
                            <a href="#" class="btn btn-warning">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tài khoản</h5>
                            <p class="card-text">Kiểm soát tài khoản người dùng hiệu quả.</p>
                            <a href="#" class="btn btn-danger">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>