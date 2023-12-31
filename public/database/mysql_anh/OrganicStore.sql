-- Tạo database
CREATE DATABASE organicstore;

-- Sử dụng database 
USE organicstore;


CREATE TABLE TinhThanh (
  idTinhThanh INT AUTO_INCREMENT PRIMARY KEY,
  tenTinhThanh NVARCHAR(500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Quận huyện
CREATE TABLE QuanHuyen (
  idQuanHuyen INT AUTO_INCREMENT PRIMARY KEY,
  tenQuanHuyen NVARCHAR(500),
  tinhThanhNo int,
  FOREIGN KEY (tinhThanhNo) REFERENCES TinhThanh(idTinhThanh)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Tạo bảng Phường xã
CREATE TABLE PhuongXa (
  idPhuongXa INT AUTO_INCREMENT PRIMARY KEY,
  tenPhuongXa NVARCHAR(500),
  quanHuyenNo int,
  FOREIGN KEY (quanHuyenNo) REFERENCES QuanHuyen(idQuanHuyen)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Thôn Tổ
CREATE TABLE ThonTo (
  idThonTo INT AUTO_INCREMENT PRIMARY KEY,
  tenThonTo NVARCHAR(500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE KhachHang(
  idKH INT AUTO_INCREMENT PRIMARY KEY,
  tenKH NVARCHAR(100),
  diaChiKH int,
  SDT VARCHAR(11),
  Email VARCHAR(50) DEFAULT '@gmail.com' UNIQUE,
  matKhau VARCHAR(50),
  FOREIGN KEY (diaChiKH) REFERENCES PhuongXa(idPhuongXa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Nhân Viên Bán Hàng  
CREATE TABLE admin (
    idAD INT AUTO_INCREMENT PRIMARY KEY,
    tenAdmin VARCHAR(255),
    email VARCHAR(255) DEFAULT '@admin.com' UNIQUE,
    matKhau VARCHAR(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Nhà Cung Cấp
CREATE TABLE NhaCungCap (
  maNCC INT AUTO_INCREMENT PRIMARY KEY,
  tenNCC NVARCHAR(100),
  diaChiNCC int,
  SDT VARCHAR(11),
  Email VARCHAR(50),
  nhanVienLienHe NVARCHAR(100),
  FOREIGN KEY (diaChiNCC) REFERENCES PhuongXa(idPhuongXa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Phiếu Nhập
CREATE TABLE PhieuNhap (
  maPN INT AUTO_INCREMENT PRIMARY KEY,
  ngayNhapHang DATETIME,
  maNCC int,
  FOREIGN KEY (maNCC) REFERENCES NhaCungCap(maNCC)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Danh mục Sản phẩm 
CREATE TABLE DanhMucSanPham (
  maDanhMuc INT AUTO_INCREMENT PRIMARY KEY,
  tenDanhMuc NVARCHAR(100),
  hinhAnh NVARCHAR(500),
  hienThi tinyint(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Sản phẩm
CREATE TABLE SanPham (
  maSanPham INT AUTO_INCREMENT PRIMARY KEY,
  tenSanPham NVARCHAR(100),
  donGia DECIMAL(10,0),
  soluongHienCon BIGINT,
  moTa NVARCHAR(1000),
  hinhAnh NVARCHAR(500),
  maDanhMuc int,
  FOREIGN KEY (maDanhMuc) REFERENCES DanhMucSanPham(maDanhMuc)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Tạo bảng Chi Tiết Phiếu Nhập
CREATE TABLE ChiTietPhieuNhap (
  maPN INT ,
  maSanPham INT ,
  soLuongNhap INT,
  giaNhap DECIMAL(10,0),
  PRIMARY KEY (maPN, maSanPham),  
  FOREIGN KEY (maPN) REFERENCES PhieuNhap(maPN),
  FOREIGN KEY (maSanPham) REFERENCES SanPham(maSanPham)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Đơn Hàng
CREATE TABLE DonHang (
  maDonHang INT AUTO_INCREMENT PRIMARY KEY,
  ngayTaoDon DATETIME,
  diachiGiaoHang int,
  SDTGiaoHang VARCHAR(11),
  maHoaDonDienTu NVARCHAR(20),  
  ngayThanhToan DATE,
  ngayGiaoHang DATE,
  trangthaiHoaDon NVARCHAR(100),
  khachhang_id int,
  admin_id int,
  ghiChu NVARCHAR(1000),  
  FOREIGN KEY (diachiGiaoHang) REFERENCES PhuongXa(idPhuongXa),
  FOREIGN KEY (khachhang_id) REFERENCES khachhang(idKH),
  FOREIGN KEY (admin_id) REFERENCES admin(idAD)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Tạo bảng Chi Tiết Đơn Thuê
CREATE TABLE ChiTietDonHang(
  maDonHang int,
  maSanPham int,
  soLuongDat INT,
  donGiaDat DECIMAL(10,0),
  ghiChu NVARCHAR(500),
  PRIMARY KEY (maDonHang, maSanPham),
  FOREIGN KEY (maDonHang) REFERENCES DonHang(maDonHang),
  FOREIGN KEY (maSanPham) REFERENCES SanPham(maSanPham)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Chèn dữ liệu vào TinhThanh (Tỉnh thành)
INSERT INTO TinhThanh (tenTinhThanh) VALUES
('Đà Nẵng'),
('Hồ Chí Minh'),
('Hà Nội');

-- Chèn dữ liệu vào QuanHuyen (Quận huyện)
INSERT INTO QuanHuyen (tenQuanHuyen, tinhThanhNo) VALUES
('Quận 1', '1'), -- Giả sử '1' là ID của Tỉnh A
('Quận 2', '2'), -- Giả sử '2' là ID của Tỉnh B
('Quận 3', '3'); -- Giả sử '3' là ID của Tỉnh C

-- Chèn dữ liệu vào PhuongXa (Phường xã)
INSERT INTO PhuongXa (tenPhuongXa, quanHuyenNo) VALUES
('Phường 1', '1'), -- Giả sử '1' là ID của Quận 1
('Phường 2', '2'), -- Giả sử '2' là ID của Quận 2
('Phường 3', '3'); -- Giả sử '3' là ID của Quận 3

-- Chèn dữ liệu vào ThonTo (Thôn Tổ)
INSERT INTO ThonTo (tenThonTo) VALUES
('Thôn X'),
('Thôn Y'),
('Thôn Z');
-- Chèn dữ liệu vào bảng KhachHang
INSERT INTO KhachHang (tenKH, diaChiKH, SDT, Email, matKhau) VALUES
('Khách Hàng 1', '1', '0123456789', 'khachhang1@gmail.com', 'matkhau1'),
('Khách Hàng 2', '2', '0987654321', 'khachhang2@gmail.com', 'matkhau2'),
('Khách Hàng 3', '3', '0123456789', 'khachhang3@gmail.com', 'matkhau3');

-- Chèn dữ liệu vào bảng admin
INSERT INTO admin (tenAdmin, email, matKhau) VALUES
('Admin 1', 'admin1@admin.com', 'adminpass1'),
('Admin 2', 'admin2@admin.com', 'adminpass2'),
('Admin 3', 'admin3@admin.com', 'adminpass3');

-- Chèn dữ liệu vào bảng NhaCungCap
INSERT INTO NhaCungCap (tenNCC, diaChiNCC, SDT, Email, nhanVienLienHe) VALUES
('Nhà Cung Cấp 1', '1', '0123456789', 'ncc1@gmail.com', 'NV1'),
('Nhà Cung Cấp 2', '2', '0987654321', 'ncc2@gmail.com', 'NV2'),
('Nhà Cung Cấp 3', '3', '0123456789', 'ncc3@gmail.com', 'NV3');

-- Chèn dữ liệu vào bảng PhieuNhap
INSERT INTO PhieuNhap (ngayNhapHang, maNCC) VALUES
('2023-11-18 12:00:00', 1), -- Giả sử '1' là ID của Nhà Cung Cấp 1
('2023-11-19 14:30:00', 2), -- Giả sử '2' là ID của Nhà Cung Cấp 2
('2023-11-20 10:15:00', 3); -- Giả sử '3' là ID của Nhà Cung Cấp 3

-- Chèn dữ liệu vào bảng DanhMucSanPham
INSERT INTO DanhMucSanPham (tenDanhMuc, hinhAnh, hienThi) VALUES
('Rau Củ Quả', 'rau-cu-qua.png', 1),
('Thực phẩm tươi sống' , 'thuc-pham-tuoi-song.png', 1),
('Thực phẩm chế biến sẵn', 'thuc-pham-che-bien-san.png', 1),
('Thực phẩm chay organic', 'thuc-pham-chay.png', 1),
('Thực phẩm khô', 'thuc-pham-kho.png', 1),
('Gia vị và phụ liệu', 'gia-vi-phu-lieu.png', 1),
('Trái cây hữu cơ', 'trai-cay-huu-co.png', 1);


-- Chèn dữ liệu vào bảng SanPham
INSERT INTO SanPham (tenSanPham, donGia, soluongHienCon, moTa, hinhAnh, maDanhMuc) VALUES
('Khô bò miếng okitchen', 100000, 50, 'Khô bò với 100% nguyên liệu từ bò ăn cỏ, sử dụng nguyên liệu bò ăn cỏ chăn thả tự nhiên, không tiêm kháng sinh, hocmoon tổng hợp và GMO. Các miếng thịt bò được giữ miếng, các công đoạn bằng tay và ướp các gia vị cơ bản như mật ong hữu cơ, bột tỏi hữu cơ, bột cần tây hữu cơ, muối biển nên vị vừa miệng với người thưởng thức. Toàn bộ nguyên liệu sản xuất do chính Organicfood.vn phát triển và cung cấp.', 'hinh31.png', 3), -- Giả sử '1' là ID của Danh Mục 1
('Cá nục tươi kho keo Hoa Nắng 300gr', 129000, 40, 'Thịt cá chắc, mềm xương được ninh trong 8 tiếng vẫn giữ nguyên hương vị truyền thống.
Được chứng nhận HACCP về an toàn thực phẩm.
Sản phẩm chỉ cần hâm nóng là có thể dùng ngay nên rất tiện lợi cho người tiêu dùng ngay cả khi bận rộn.
Sản phẩm được đóng hộp rất chắc chắn và an toàn nên thích hợp mang đi trong những chuyến du lịch cùng gia đình hoặc bạn bè.', 'hinh32.png', 3), -- Giả sử '2' là ID của Danh Mục 2
('Mứt dâu tây hữu cơ jardin bio 320g', 235000, 50, 'Jardin Bio étic là một trong những thành công của Lea Nature ra đời năm 1995. Đây là thương hiệu đi đầu về sản xuất thực phẩm hữu cơ dinh dưỡng. Trong đó, 70% sản phẩm mang thương hiệu Jardin Bio étic được xếp loại A&B, 90% sản phẩm không có chất phụ gia, hương liệu, 75% sản phẩm được chứng nhận sử dụng nguyên liệu 100% hữu cơ, không có thuốc trừ sâu, hóa chất hoặc biến đổi gen (non – GMO), không thử nghiệm trên động vật.', 'hinh33.png', 3), -- Giả sử '3' là ID của Danh Mục 3
('Bánh mỳ hữu cơ sottolestelle 400g', 200000, 70, ' Sản phẩm bánh mì hữu cơ Sottolestelle là bánh mì tự nhiên nên khô nhẹ hơn bánh mì Sandwich ngoài thị trường.', 'hinh34.png', 3), -- Giả sử '2' là ID của Danh Mục 2
('Lạp xưởng vịt vị tiêu đen Danny Green 120g', 123000, 30, 'Thịt vịt (70%), thịt heo, đường, muối, tiêu đen (1,5%), rượu mai quế lộ, vỏ bọc collagen…', 'hinh35.png', 3), -- Giả sử '2' là ID của Danh Mục 2
('Bánh tráng gạo lứt hữu cơ Bích Chi 200g', 59000, 10, 'Thông tin sản phẩm đang được cập nhật', 'hinh36.png', 3), -- Giả sử '2' là ID của Danh Mục 2
('Bánh tráng trắng hữu cơ Bích Chi 200g', 50000, 80, 'Bánh tráng trắng hữu cơ Bích Chi 200g

Xuất xứ: Việt Nam

Chứng nhận hữu cơ châu âu, mỹ

Thành phần: tinh bột khoai mì, gạo, muối

Cách dùng: cuốn các món ăn trực tiếp như rau với thịt, cá…', 'hinh37.png', 3), -- Giả sử '2' là ID của Danh Mục 2
('Chà bông tôm tự nhiên 50g', 210000, 90, 'Được sản xuất từ tôm tươi Cà Mau Không chất bảo quản, không bột ngọt Được sấy khô với quy trình an toàn vệ sinh thực phẩm
Xuất xứ: Việt Nam
Bảo quản: : Bảo quản ở ngăn mát tủ lạnh', 'hinh38.png', 3), -- Giả sử '2' là ID của Danh Mục 2
('Mắm ruốc bà duệ', 101000, 20, 'Hạn sử dụng 6 tháng( kể từ ngày sản xuất). Được chế biến từ con tép biển tươi ngon, mắm ruốc Bà Duệ là thứ gia vị không thể thiếu trong chế biến các món ăn, đặc biệt là món bún Huế.', 'hinh39.png', 3), -- Giả sử '2' là ID của Danh Mục 2
('Mì ăn liền hữu cơ vị tỏi và tiêu 85g', 50000, 17, 'Thành phần: Gạo lứt hữu cơ (82,35%), bột nêm vị tỏi và hạt tiêu hữu cơ (17,65%) (Đường hữu cơ, Maltodextrin hữu cơ, muốn biển, gia vị và thảo dược hữu cơ, chiết xuất nấm men)
HDSD: Dùng chế biến các món ăn
Bảo quản: Nơi thoáng mát, khô ráo, tránh tiếp xúc trực tiếp ánh nắng mặt trời.
Xuất xứ : Thái Lan', 'hinh40.png', 3), -- Giả sử '2' là ID của Danh Mục 2
('Chà bông nấm hương vị cay ngọt 100g', 105000, 20, 'Chân nấm hương (80%), dầu thực vật, muối, đường, ớt, sả, tỏi, gừng.', 'hinh41.png', 4), -- Giả sử '2' là ID của Danh Mục 2
('Dầu hào chay hữu cơ sauceca 155ml', 131000, 40, 'Đậu nành hữu cơ, lúa mỳ hữu cơ , gạo nếp hữu cơ, nấm hương, đường hữu cơ, cam thảo, nước, muối.', 'hinh42.png', 4), -- Giả sử '2' là ID của Danh Mục 2
('Dầu hào chay hữu cơ sauceco 420ml', 131000, 21, 'lúa mì hữu cơ, hạt đậu nành hữu cơ, nước, muối, đường, gạo nếp hữu cơ, nấm hữu cơ, cam thảo hữu cơ', 'hinh43.png', 4), -- Giả sử '2' là ID của Danh Mục 2
('Giò nấm mát lạnh 200g', 75000, 50, 'Thương hiệu: NẤM TƯƠI CƯỜI
Sản xuất tại: KCN Hapro, xã Lệ Chi, huyện Gia Lâm, Hà Nội
Thành phần: Nấm bào ngư 30%,, mộc nhĩ 25%, nấm yến 10%, nấm hương 5%, muối, hạt tiêu, dầu thực vật, chất chống vón cục E551, chất điều chỉnh độ axit, chất chống oxi hóa.
Trọng lượng: 200G/ gói
Hướng dẫn sử dụng: ăn liền cùng cơm, cháo, bánh mì, hoặc kết hợp với các món khác tùy ý.
Hướng dẫn bảo quản: bảo quản ở nhiệt độ 4 - 6 độ C
Hạn sử dụng: 02 tháng kể từ ngày sản xuất.', 'hinh44.png', 4), -- Giả sử '2' là ID của Danh Mục 2
('Mì gạo lứt ăn liền hữu cơ thuần chay vị thịt gà lumlum 75g', 51000, 31, 'Thành phần: Gạo lứt, nước vị gà hữu cơ: tỏi hữu cơ, rau mùi hữu cơ, tương đậu nành hữu cơ, tiêu hữu cơ, hành khô hữu cơ, đường mía hữu cơ, dầu dừa hữu cơ, muối, nước, axit xitric.', 'hinh45.png', 4), -- Giả sử '2' là ID của Danh Mục 2
('Pate bí ngòi hữu cơ bioitalia - 180g', 110000, 49, 'Pate Bí Ngòi Hữu Cơ Bioitalia (180g) - thuộc thương hiệu Bioitalia với thành phần 100% Organic nhập khẩu từ Ý
Thành phần cấu tạo: Bí ngòi 75%, dầu oliu nguyên chất, trái oliu xanh, hành tây, hạt bạch hoa, tinh bột khoai tây, hạt thông, tỏi (từ nông nghiệp hữu cơ).', 'hinh46.png', 4), -- Giả sử '2' là ID của Danh Mục 2
('Thịt gà chay Green Rebel 200g', 105000, 40, 'Thành phần: 100% nguyên liệu tự nhiên từ thực vật.', 'hinh47.png', 4), -- Giả sử '2' là ID của Danh Mục 2
('Thịt burger chay future 230g', 199000, 10, 'Thịt Burger chay Future 230g. Với lượng protein và 100% được làm từ các nguyên liệu tự nhiên, Future Burger biến bất kỳ công thức nào thành một công thức thực vật ngon tuyệt. Non-GMO. Không chứa Gluten', 'hinh48.png', 4), -- Giả sử '2' là ID của Danh Mục 2
('Xúc xích chay future 250g', 235000, 40, 'Thịt Burger chay Future 250g. Với lượng protein và 100% được làm từ các nguyên liệu tự nhiên, Future Burger biến bất kỳ công thức nào thành một công thức thực vật ngon tuyệt. Non-GMO. Không chứa Gluten', 'hinh49.png', 4), -- Giả sử '2' là ID của Danh Mục 2
('Xúc xích hữu cơ Ener bio 250g', 239000, 55, 'Xúc xích vegan thuần chay bio Tofu Bratwurst enerBiO với thành phần hoàn toàn tự nhiên từ đậu nành, đặc biệt phù hợp để chiên, nướng và thưởng thức cùng bánh mì 
- Vegan
- Thuần chay 
- Sản xuất tại Đức
- Chứng nhận hữu cơ Châu âu
Thành phần: 100% thuần chay với thành phần từ đậu phụ, bột mì, nước , dầu hướng dương , muối biển, đường mía ... cung cấp protein và canxi', 'hinh50.png', 4); -- Giả sử '2' là ID của Danh Mục 2
INSERT INTO SanPham (tenSanPham, donGia, soluongHienCon, moTa, hinhAnh, maDanhMuc) VALUES
('Cải kale hữu cơ - 250g', 62500, 150, 'Cải Kale là một loại rau với lá xanh, có họ gần với bắp cải hơn các loại rau trồng khác. Với đặc tính khá cứng nên phải nấu khá lâu mới mềm (như rau ngót). Cải Kale rất giàu chất xơ, canxi cùng nhiều vitamin (như vitamin C, A, K…) và khoáng chất có lợi khác(như sắt, canxi, kali, mangan và phốt pho…).', 'CaiKale.jpg', 1), -- Giả sử '1' là ID của Danh Mục 1
('Khổ qua hữu cơ - 300g', 34500, 90, 'Trên lâm sàng, khổ qua thường dùng chữa các chứng do bệnh nhiệt gây thử nhiệt phiền khát, trúng thử (say nóng), ung sưng, mắt đỏ đau nhức, kiết lỵ, viêm quầng, nhọt độc, tiểu ít… Khổ qua (mướp đắng) – Momordia charantia L. thuộc họ Hồ lô (Cucurbitaceae). Vị đắng, tính mát, không độc. Vào kinh tâm, can, tỳ và vị.', 'KhoQua.jpg', 1), -- Giả sử '2' là ID của Danh Mục 2
('Cà chua bee ngọt hữu cơ - 300g', 56700, 120, 'Cà chua bi rất giàu vitamin C, vitamin A và canxi. Những lợi ích sức khỏe của chúng là chất chống oxy hóa đáng chú ý và phòng chống ung thư. Theo WHFoods, trong một nghiên cứu 14 tháng,trên Tạp chí của Viện Ung thư Quốc gia tìm thấy cà chua đóng một vai trò quan trọng trong việc phòng ngừa ung thư tuyến tiền liệt. Cà chua chứa lycopene, chất có liên quan đến công tác phòng chống bệnh tim. Nó cũng có chức năng như một chất chống oxy hóa giúp bảo vệ tế bào.', 'CaChua.jpg', 1), -- Giả sử '3' là ID của Danh Mục 3
('Đọt rau lang hữu cơ - 300g', 38000, 0, 'Rau khoai lang là thứ rau dân dã trước đây chỉ dành cho nhà nghèo. Ngày nay, người ta đã "phát hiện" ra rằng thứ rau này cũng rất ngon và có nhiều tác dụng đối với sức khỏe. Ở một số nước như châu Âu, Hồng Kông, Nhật Bản... rau khoai lang không còn là loại rau dân dã mà đã trở thành một loại thực phẩm cao cấp có mặt trong những nhà hàng sang trọng.', 'RauLang.jpg', 1), -- Giả sử '3' là ID của Danh Mục 3
('Đậu cove hữu cơ - 300g', 37500, 20, ' Đậu cove thuộc họ đâu, có thân nhỏ tròn và dài như chiếc đũa, đậu có màu xanh nhạt khi còn non và xanh lục khi chín. Loại đậu này tính ôn, có tác dụng nhuận tràng, bồi bổ nguyên khí. Đậu cô ve không chỉ có chứa nhiều nguyên tố vi lượng như protein, canxi, sắt, mà còn có nhiều kali, magie, ít natri.', 'DauCoVe.jpg', 1), -- Giả sử '3' là ID của Danh Mục 3
('Cải bó xôi hữu cơ - 250g', 43500, 180, 'Cải bó xôi còn gọi là rau chân vịt, ba thái, có tên khoa học là Spinacia oleracea L. Chenopodiaceae. Cải bó xôi thường có cuống nhỏ và lá xanh đậm, lá mọc chụm lại ở một gốc bé xíu. Thân và lá dòn, dễ gãy, dập. Cải bó xôi không những là một món ăn ngon mà còn có tác dụng rất “thần kỳ” trong y học để phòng và chữa nhiều bệnh ', 'CaiBoSoi.jpg', 1), -- Giả sử '3' là ID của Danh Mục 3
('Bí ngòi xanh hữu cơ - 300g', 34500, 50, 'Bí ngòi xanh là loại trái thuộc họ bầu bí, thân tròn, dài, bên ngoài bí có màu xanh sậm, có ít vân. CÔNG DỤNG Bí ngòi nói chung giúp chữa các bệnh về hô hấp như hen suyễn, giúp tránh nhồi máu cơ tim và đột quỵ, ngăn ngừa cá bệnh về hoại huyết, thâm tím bị gây ra do thiếu hụt vitamin C. Bí ngòi còn giúp tăng khả năng ngăn ngừa chứng đa xơ cứng, ung thư ruột già, ngăn xơ vữa động mạch, làm hạ huyết áp. Một số công dụng khác như : Chống lão hóa, tăng cường trí nhớ và làm thuyên giảm những chứng bệnh liên quan đến lão hóa. Bí ngòi còn có tác dụng giảm cân vì các chất dinh dưỡng trong bí ngòi cũng có tác dụng làm tăng chuyển hóa, đồng thời loại quả này 90% là nước và có hàm lượng  calorie thấp nên giảm cân hiệu quả. ', 'BiNgoi.jpg', 1), -- Giả sử '3' là ID của Danh Mục 3
('Rau ngót ta hữu cơ - 300g', 43000, 70, ' Rau ngót tính mát lạnh (nấu chín sẽ bớt lạnh), vị ngọt. Có công năng thanh nhiệt, giải độc, lợi tiểu, tăng tiết nước bọt, hoạt huyết hoá ứ, bổ huyết, cầm huyết, nhuận tràng, sát khuẩn, tiêu viêm, sinh cơ, có nhiều tác dụng chữa bệnh.', 'RauNgot.jpg', 1),-- Giả sử '3' là ID của Danh Mục 3
('Cải bẹ trắng hữu cơ - 300g', 29400, 0, 'Cải bẹ trắng có hình dáng gần giống cải thìa nhưng cuốn của nó màu trắng sữa. Cải bẹ trắng thường dùng đễ chế biến : nấu canh, hấp cá, ăn lẩu, ăn sống, trộn dầu giắm ăn như xà lách, muối dưa. Thành phần dinh dưỡng trong 100g rau cải bẹ trắng ăn được trong đó có nước 92%, đạm 1,5%, chất béo 0,0%, chất bột 1,5%, chất xơ 1,5%, chữa nhiều vitamin khác. Cải bẹ trắng là loại rau được nhiều người sử dụng, có vị cay tính mát, thanh phề, tiêu đàm những người ho khan, bụng đầy chậm tiêu do tỳ. phế nhiệt dùng đều tốt.', 'CaiBeTrang.jpg', 1), -- Giả sử '3' là ID của Danh Mục 3
('Bắp tím nữ hoàng - 500g', 54500, 0, 'Bắp nữ hoàng là giống bắp ngọt, có nguồn gốc từ Thái Lan, được nhập về Việt Nam và trồng nhiều ở khu vực Đông Nam Bộ cùng với đồng bằng sông Cửu Long. Được trồng theo quy trình chuẩn hữu cơ', 'Bap.jpg', 1), -- Giả sử '3' là ID của Danh Mục 3
('Tôm thẻ thịt sinh thái hữu cơ Seaprpdex 250g size 21/25 con', 154000, 50, 'Tôm dường như là món ăn không thể thiếu cho bữa tiệc gia đình hay mâm cỗ thêm phần sang trọng, đẹp mắt. Không chỉ đẹp món tôm còn có hương vị hấp dẫn cũng như là giá trị dinh dưỡng cao, tốt cho sức khỏe. Tôm thẻ thịt sinh thái Seaprodex - Túi 250g - Kích cỡ 21/25 là sản phẩm tôm hữu cơ, cho hương vị nguyên bản và đảm bảo sức khỏe cho mọi người.', 'Tom.jpg', 2), -- Giả sử '1' là ID của Danh Mục 1
('Gầu bò Úc tươi hữu cơ Obe 300g', 204000, 80, 'Gầu bò Úc tươi hữu cơ Obe mềm mọng, được cắt thái theo yêu cầu của khách hàng, dễ dàng chế biến thành nhiều món ăn hấp dẫn', 'BoUc.jpg', 2), -- Giả sử '2' là ID của Danh Mục 2
('Mực lá làm sạch gói 450g', 270000, 100, 'Đây là loại mực mang chất giòn, ngọt. Những ai thích ăn mực giòn và dày thịt thì chọn loại này', 'Muc.jpg', 2), -- Giả sử '3' là ID của Danh Mục 3
('Cá diêu hồng phile 500g', 175000, 50, 'Cá diêu hồng còn được gọi là cá rô phi đỏ, một loài cá nước ngọt, bên ngoài phủ vảy màu đỏ hồng hoặc vàng đậm, có thịt dày và ngọt. Cá diêu hồng nhận sự quan tâm, yêu thích của nhiều người bởi cá không quá nhiều xương, độ tươi ngon của phần thịt khi chế biến món ăn và giá trị dinh dưỡng mà nó đem lại. Cá diêu hồng tại Organicfood.vn được nuôi tự nhiên tại hồ Trị An, Đồng Nai.', 'CaDieuHong.jpg', 2), -- Giả sử '1' là ID của Danh Mục 1
('Tôm Tích Tách Nõn Hấp Chín Gói 500gr', 329000, 0, 'Tôm tích, tôm tít, tôm thuyền, bề bề hay tôm búa, bàn chải. Rải đều mõi vùng miền biển lại có tên gọi khác nhau nhưng có đặc điểm chung là thịt tôm tích rất ngon, ngọt, hiền lành vừa đậm đà hương biển. Có một số nơi ngư dân đánh bắt được chỉ để dành chờ khách quý đến đãi ăn, coi như là hải sản quí hiếm mà biển cả bàn tặng.', 'TomTich.jpg', 2), -- Giả sử '2' là ID của Danh Mục 2
('Cá Hồi Tự Nhiên Nauy Phile 200g', 154000, 100, 'Cá hồi Nauy được nuôi trong môi trường biển tự nhiên của Nauy nằm ở Bắc Đại Tây Dương. Quá trình chăn nuôi được quản lý nghiêm ngặt từ khi chúng còn trong trứng tới khi trưởng thành, nguồn Protein cung cấp từ thức ăn cho cá đảm bảo an toàn và lành mạnh giữ cho cá hồi sạch cũng như tác động tới môi trường biển là nhỏ nhất. Những farm nuôi cá hồi Nauy của Salmar được đặt tại vùng biển phía Bắc Đại Tây Dương có khí hậu lạnh quanh năm, nằm giữa các dãy núi tuyết, có nguồn nước trong và sạch cùng môi trường tự nhiên lý tưởng tạo nên điều kiện sống thuận lợi cho cá hồi phát triển với chất lượng cao nhất.', 'CaHoi.jpg', 2), -- Giả sử '3' là ID của Danh Mục 3
('Tôm Sú Sinh Thái Nguyên Con Hữu Cơ Seaprodex - 500g', 239000, 30, 'Sử dụng con giống được chứng nhận sinh thái, thả thưa dưới những tán rừng đước xanh ngắt. Thức ăn tự nhiên dồi dào một phần nhờ vào các dòng thủy triều mang theo các loài phiêu sinh động vật, phiêu sinh thực vật vào vuông tôm - là nguồn thức ăn của tôm nên không cần phải sử dụng thức ăn công nghiệp', 'TomSu.jpg', 2), -- Giả sử '1' là ID của Danh Mục 1
('Cua đồng tinh chế vinacua 150g', 59000, 30, 'Thịt cua đồng tinh chế không cần xay, giã ,lọc. Thành phần: thịt cua đồng tinh chế (đã giã và tách bỏ toàn bộ bã và vỏ), muối, túi gạchCông dụng: Dùng để nấu canh cua, bún riêu cua,canh bánh đa... HSD: Hạn sử dụng 1 năm và sử dụng trong vòng 1 tháng. Bảo quản ở 18 độ C', 'CuaDong.jpg', 2), -- Giả sử '2' là ID của Danh Mục 2
('Cá Tuyết Alaska Fillet 300g', 276000, 200, 'Cá Tuyết là dòng cá biển thịt trắng rất được ưa chuộng ở thị trường Bắc Mỹ, Châu Âu và ngày càng trở nên nổi tiếng ở Châu Á vì hương vị đặc trưng đậm đà, tươi ngon và dinh dưỡng cao, phù hợp để chế biến tất cả món ăn ngon từ phong cách Âu sang Á. Quý khách có thể tham khảo 1 số món ngon từ Cá Tuyết Alaska dưới đây để bữa ăn thêm dinh dưỡng và đặc sắc.', 'CaTuyet.jpg', 2), -- Giả sử '3' là ID của Danh Mục 3
('Cá thu atka xẻ bướm 280g', 134000, 90, 'Cá Thu Atka Nhật Bản là món ăn bổ dưỡng được người Nhật yêu thích và là một trong những bí quyết làm nên ẩm thực của đất nước có tuổi thọ bình quân cao nhất thế giới. ', 'CaThuXeBuom.jpg', 2); -- Giả sử '1' là ID của Danh Mục 1
INSERT INTO SanPham(tenSanPham, donGia, soluongHienCon, moTa, hinhAnh, maDanhMuc) VALUES
('Baking soda', 50000, 100, 'Tẩy tế bào chết: pha 3 phần baking soda với 1 phần nước và dùng hỗn hợp này tẩy da chết cho mặt và toàn thân', 'baking-soda.jpg', 5),
('Bánh gạo lứt', 35000, 80, 'Bánh gạo lứt là một loại bánh truyền thống được làm từ gạo lứt, một loại gạo có hạt nhỏ và màu nâu', 'banh-gao-lut.jpg', 5),
('Bánh hỏi hữu cơ', 40000, 70, 'Bánh hỏi hữu cơ là một phiên bản của bánh hỏi được làm từ các nguyên liệu hữu cơ', 'banh-hoi-huu-co.jpg', 5),
('Bánh ngũ cốc', 45000, 60, 'Bánh ngũ cốc là một loại bánh được làm chủ yếu từ các nguyên liệu ngũ cốc, như lúa mì, yến mạch, lúa mạch, ngô, và gạo', 'banh-ngu-coc.jpg', 5),
('Bánh phở trắng', 30000, 90, 'Bánh phở trắng, còn được gọi là bánh phở Lý Quốc Sư, là một loại bánh truyền thống được sử dụng trong món phở', 'banh-pho-trang.jpg', 5),
('Bánh quy hạt kê', 25000, 110, 'Bánh quy hạt kê là một loại bánh quy có chứa hạt kê (hay còn gọi là hạt mè)', 'banh-quy-hat-ke.jpg', 5),
('Bánh quy táo', 28000, 95, 'Bánh quy táo là một loại bánh quy có hương vị táo tuyệt vời. Bánh quy này thường có hình dạng tròn hoặc hình lá táo, với một lớp vỏ ngoài giòn và hương vị táo thơm ngon', 'banh-quy-tao.jpg', 5),
('Bột bắp', 30000, 50, 'Bột bắp là một loại bột được làm từ ngô hoặc hạt bắp, thông qua quá trình xay nhuyễn thành dạng bột. Bột bắp có màu vàng nhạt và có mùi thơm tự nhiên của ngô', 'bot-bap.jpg', 5),
('Bánh ngô ngọt', 32000, 75, 'Bánh ngô ngọt là một loại bánh có thành phần chính là ngô và được làm từ bột ngô hoặc bột hỗn hợp gồm ngô và các nguyên liệu khác như bột mì, đường, trứng, sữa và bơ', 'banh-ngo-ngot.jpg', 5),
('Bỏng lúa mì', 40000, 85, 'Bỏng lúa mì là sản phẩm được làm từ hạt lúa mì đã được rang chín. Nó có vị giòn, thơm và hương vị đặc trưng của lúa mì	', 'bong-lua-mi.jpg', 5),
('Bắp ngô ngọt', 32000, 75, 'Bắp ngô ngọt là một loại ngô có hương vị ngọt tự nhiên và thường được sử dụng làm món ăn hoặc thành phần trong các món khác. Bắp ngô ngọt có hạt có màu vàng hoặc trắng tùy thuộc vào loại', 'bap-ngo-ngot.jpg', 6),
('Bơ cacao', 80000, 50, 'Bơ cacao, hay còn được gọi là bơ ca cao, là một loại chất béo có nguồn gốc từ hạt ca cao', 'bo-cacao.jpg', 6),
('Bột bắp', 25000, 90, 'Bột bắp là một loại bột được làm từ bắp, còn được gọi là ngô hoặc lúa mì ngô', 'bot-bap.jpg', 6),
('Bột bắp hữu cơ', 30000, 70, 'Bột bắp hữu cơ là một loại bột bắp được sản xuất từ nguồn ngô hữu cơ, tức là từ cây ngô được trồng theo phương pháp hữu cơ, không sử dụng hóa chất đồng nông hay phân bón hóa học', 'bot-bap-huu-co.jpg', 6),
('Bột chiên xù', 20000, 100, 'Bột chiên xù là một loại bột được sử dụng để làm vỏ bên ngoài giòn và màu vàng khi chiên', 'bot-chien-xu.jpg', 6),
('Bột gạo tẻ', 18000, 110, 'Bột gạo tẻ là một loại bột được làm từ gạo tẻ, còn được gọi là gạo nâu', 'bot-gao-te.jpg', 6),
('Bột gừng', 30000, 80, 'Bột gừng là một loại bột được làm từ rễ gừng khô. Gừng là một loại cây thuộc họ Gừng', 'bot-gung.jpg', 6),
('Bột hành', 22000, 95, 'Bột hành là một loại bột được làm từ hành khô', 'bot-hanh.jpg', 6),
('Bột hoa hồi', 35000, 75, 'Bột hoa hồi là một loại bột được làm từ hoa hồi, còn được gọi là hoa quế', 'bot-hoa-hoi.jpg', 6),
('Bột nêm', 25000, 80, 'Bột nêm là một loại sản phẩm gia vị có dạng bột được sử dụng để gia vị và tăng cường mùi vị trong nấu ăn', 'bot-nem.jpg', 6),
('Kiwi', 60000, 60, 'Màu xanh từ newzeland', 'kiwi.jpg', 7),
('Táo hữu cơ Mỹ', 40000, 90, 'Táo tổng hợp nhiều canxi', 'tao-huu-co-my.jpg', 7),
('Lựu Thái Lan', 50000, 80, 'Lựu nhiều hạt được trồng ở vùng nhiệt đới ', 'luu-thai-lan.jpg', 7),
('Việt quất New Zealand', 70000, 70, 'Màu tìm đậm rực rỡ với nhiều dưỡng chất', 'viet-quat.jpg', 7),
('Chuối già hữu cơ', 40000, 100, 'Chất lượng đến tự từng quả chuối', 'chuoi-gia-huu-co.jpg', 7),
('Nho xanh không hạt', 55000, 95, 'Nho xanh không xanh không lấy tiền', 'nho-xanh-khong-hat.jpg', 7),
('Thanh long trắng', 50000, 30, 'Thanh long trắng gần như không có hạt', 'thanh-long-trang.jpg', 7),
('Dừa xiêm', 35000, 50, 'Dừa xiêm nhiều nước và cơm', 'dua-xiem.jpg', 7),
('Đu đủ ruột vàng', 40000, 40, 'Đủ đủ có nhiều chất dinh dưỡng cho sức khỏe', 'du-du-ruot-vang.jpg', 7),
('Bơ cu ba', 60000, 20, 'Bơ to, và nhiều cơm ', 'bo-cu-ba.jpg', 7);


-- Chèn dữ liệu vào bảng ChiTietPhieuNhap
INSERT INTO ChiTietPhieuNhap (maPN, maSanPham, soLuongNhap, giaNhap) VALUES
(1, 1, 20, 90000), -- Giả sử '1' là ID của Phiếu Nhập 1 và '1' là ID của Sản Phẩm 1
(2, 2, 15, 130000), -- Giả sử '2' là ID của Phiếu Nhập 2 và '2' là ID của Sản Phẩm 2
(3, 3, 10, 180000); -- Giả sử '3' là ID của Phiếu Nhập 3 và '3' là ID của Sản Phẩm 3

-- Chèn dữ liệu vào bảng DonHang
INSERT INTO DonHang (ngayTaoDon, diachiGiaoHang, SDTGiaoHang, maHoaDonDienTu, ngayThanhToan, ngayGiaoHang, trangthaiHoaDon, khachhang_id, admin_id, ghiChu) VALUES
('2023-11-18 15:00:00', '1', '0123456789', 'HD001', '2023-11-19', '2023-11-20', 'Đã thanh toán', 1, 1, 'Ghi chú đơn hàng 1'),
('2023-11-19 10:30:00', '2', '0987654321', 'HD002', '2023-11-20', '2023-11-21', 'Chưa thanh toán', 2, 2, 'Ghi chú đơn hàng 2'),
('2023-11-20 12:45:00', '2', '0123456789', 'HD003', '2023-11-21', '2023-11-22', 'Chưa thanh toán', 3, 3, 'Ghi chú đơn hàng 3');

-- Chèn dữ liệu vào bảng ChiTietDonHang
INSERT INTO ChiTietDonHang (maDonHang, maSanPham, soLuongDat, donGiaDat, ghiChu) VALUES
('1', 1, 10, 100000, 'Ghi chú sản phẩm trong đơn hàng 1'), -- Giả sử 'HD001' là Mã đơn hàng 1 và '1' là ID của Sản Phẩm 1
('2', 2, 8, 150000, 'Ghi chú sản phẩm trong đơn hàng 2'), -- Giả sử 'HD002' là Mã đơn hàng 2 và '2' là ID của Sản Phẩm 2
('3', 3, 5, 200000, 'Ghi chú sản phẩm trong đơn hàng 3'); -- Giả sử 'HD003' là Mã đơn hàng 3 và '3' là ID của Sản Phẩm 3



select*from DanhMucSanPham



