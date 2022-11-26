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
		const url = event.target.results
			
			document.querySelector("img").src = URL.createObjectURL(url);
	})
})