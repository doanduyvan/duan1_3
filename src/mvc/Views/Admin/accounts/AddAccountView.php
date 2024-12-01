<style>
    .addAccount {
        color: black;
        font-weight: 500;
        font-size: 20px;
        margin-bottom: 10px;
    }
</style>

<div class="addcategory w-[90%] mx-auto mt-[20px] p-[20px] shadow rounded-[10px]">
    <h2 class="addAccount">Add Account</h2>
    <div>
        <form class="flex flex-col justify-center gap-[20px]" method="post" id="addacount">
            <input class="bg-[#F9F9F9] p-[10px] rounded-[10px] outline-none" type="text" name="name" placeholder="Full Name">
            <input class="bg-[#F9F9F9] p-[10px] rounded-[10px] outline-none" type="text" name="email" placeholder="Email">
            <button class="block bg-[#17C653] hover:bg-[#04B440] text-white py-[5px] px-[10px] rounded-[5px] cursor-pointer w-fit">Add</button>
        </form>
    </div>
</div>

<script>
    const Eform = document.getElementById("addacount");
    Eform.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const account = {};
        account.name = formData.get('name');
        account.email = formData.get('email');

        const nameRegex = /^[a-zA-Z\s]{3,}$/; // Regex chỉ chấp nhận chữ cái và khoảng trắng, tối thiểu 3 ký tự
        if (!nameRegex.test(account.name)) {
            toast({
                title: "Warning",
                message: "Name must be at least 3 characters and contain only letters",
                type: "warning"
            });
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex kiểm tra định dạng email
        if (!emailRegex.test(account.email)) {
            toast({
                title: "Warning",
                message: "Invalid email format",
                type: "warning"
            });
            return;
        }

        const options = {
            method: 'POST',
            body: JSON.stringify(account),
            headers: {
                'Content-Type': 'application/json'
            }
        };

        const Uri = 'admin/account/createaccount';

        load(1);

        fetch(Uri, options)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.error) {
                    toast({
                        title: "Error",
                        message: data.error,
                        type: "fail"
                    });
                    return;
                }
                toast({
                    title: "Success",
                    message: data.message,
                    type: "success"
                });
            })
            .catch((error) => {
                toast({
                    title: "Error",
                    message: error,
                    type: "fail"
                });
                console.error('Error:', error);
            })
            .finally(() => {
                load(0);
            });


    });
</script>