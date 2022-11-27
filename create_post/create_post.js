const fileUpload = document.querySelector("#file-upload");

fileUpload.addEventListener("change", (event) => {
	const { files } = event.target;
	
	console.log("files", files)
})

// Khởi tạo đối tượng FileReader
const reader = new FileReader();

// Lắng nghe trạng thái đăng tải tệp
fileUpload.addEventListener("change", (event) => {
	// Lấy thông tin tập tin được đăng tải
	const files  = event.target.files;
	
	// Đọc thông tin tập tin đã được đăng tải
	reader.readAsDataURL(files[0])
	
	// Lắng nghe quá trình đọc tập tin hoàn thành
	reader.addEventListener("load", (event) => {
		// Lấy chuỗi Binary thông tin hình ảnh
		const img = event.target.result;
		
		// Thực hiện hành động gì đó, có thể append chuỗi giá trị này vào thẻ IMG
		console.log(img) // data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAA........
	})
})


var rid = document.querySelector('.rid')

rid.onclick = function(){
	location.href = "/index.html"
}