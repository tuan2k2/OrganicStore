-- Tạo database
CREATE DATABASE shop_organic;

-- Sử dụng database 
USE shop_organic;


CREATE TABLE TinhThanh (
  idTinhThanh INT AUTO_INCREMENT PRIMARY KEY,
  tenTinhThanh NVARCHAR(500)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Quận huyện
CREATE TABLE QuanHuyen (
  idQuanHuyen INT AUTO_INCREMENT PRIMARY KEY,
  tenQuanHuyen NVARCHAR(500),
  tinhThanhNo VARCHAR(20),
  FOREIGN KEY (tinhThanhNo) REFERENCES TinhThanh(idTinhThanh)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Tạo bảng Phường xã
CREATE TABLE PhuongXa (
  idPhuongXa INT AUTO_INCREMENT PRIMARY KEY,
  tenPhuongXa NVARCHAR(500),
  quanHuyenNo VARCHAR(20),
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
  diaChiKH VARCHAR(20),
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
  diaChiNCC VARCHAR(20),
  SDT VARCHAR(11),
  Email VARCHAR(50),
  nhanVienLienHe NVARCHAR(100),
  FOREIGN KEY (diaChiNCC) REFERENCES PhuongXa(idPhuongXa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Phiếu Nhập
CREATE TABLE PhieuNhap (
  maPN INT AUTO_INCREMENT PRIMARY KEY,
  ngayNhapHang DATETIME,
  maNCC VARCHAR(20),
  FOREIGN KEY (maNCC) REFERENCES NhaCungCap(maNCC)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Danh mục Sản phẩm 
CREATE TABLE DanhMucSanPham (
  maDanhMuc INT AUTO_INCREMENT PRIMARY KEY,
  tenDanhMuc NVARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tạo bảng Sản phẩm
CREATE TABLE SanPham (
  maSanPham INT AUTO_INCREMENT PRIMARY KEY,
  tenSanPham NVARCHAR(100),
  donGia DECIMAL(10,0),
  soluongHienCon BIGINT,
  moTa NVARCHAR(1000),
  hinhAnh NVARCHAR(500),
  maDanhMuc VARCHAR(20),
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
  diachiGiaoHang VARCHAR(20),
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
  maDonHang VARCHAR(20),
  maSanPham VARCHAR(20),
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
('Khách Hàng 1', 'Địa chỉ 1', '0123456789', 'khachhang1@gmail.com', 'matkhau1'),
('Khách Hàng 2', 'Địa chỉ 2', '0987654321', 'khachhang2@gmail.com', 'matkhau2'),
('Khách Hàng 3', 'Địa chỉ 3', '0123456789', 'khachhang3@gmail.com', 'matkhau3');

-- Chèn dữ liệu vào bảng admin
INSERT INTO admin (tenAdmin, email, matKhau) VALUES
('Admin 1', 'admin1@admin.com', 'adminpass1'),
('Admin 2', 'admin2@admin.com', 'adminpass2'),
('Admin 3', 'admin3@admin.com', 'adminpass3');

-- Chèn dữ liệu vào bảng NhaCungCap
INSERT INTO NhaCungCap (tenNCC, diaChiNCC, SDT, Email, nhanVienLienHe) VALUES
('Nhà Cung Cấp 1', 'Địa chỉ 1', '0123456789', 'ncc1@gmail.com', 'NV1'),
('Nhà Cung Cấp 2', 'Địa chỉ 2', '0987654321', 'ncc2@gmail.com', 'NV2'),
('Nhà Cung Cấp 3', 'Địa chỉ 3', '0123456789', 'ncc3@gmail.com', 'NV3');

-- Chèn dữ liệu vào bảng PhieuNhap
INSERT INTO PhieuNhap (ngayNhapHang, maNCC) VALUES
('2023-11-18 12:00:00', 1), -- Giả sử '1' là ID của Nhà Cung Cấp 1
('2023-11-19 14:30:00', 2), -- Giả sử '2' là ID của Nhà Cung Cấp 2
('2023-11-20 10:15:00', 3); -- Giả sử '3' là ID của Nhà Cung Cấp 3

-- Chèn dữ liệu vào bảng DanhMucSanPham
INSERT INTO DanhMucSanPham (tenDanhMuc) VALUES
('Rau Củ Quả'),
('Thực phẩm tươi sống'),
('Thực phẩm chế biến sẵn'),
('Thực phẩm chay organic'),
('Thực phẩm khô'),
('Gia vị và phụ liệu'),
('Trái cây hữu cơ');


-- Chèn dữ liệu vào bảng SanPham
INSERT INTO SanPham (tenSanPham, donGia, soluongHienCon, moTa, hinhAnh, maDanhMuc) VALUES
('Sản Phẩm 1', 100000, 50, 'Mô tả sản phẩm 1', 'hinh1.jpg', 1), -- Giả sử '1' là ID của Danh Mục 1
('Sản Phẩm 2', 150000, 30, 'Mô tả sản phẩm 2', 'hinh2.jpg', 2), -- Giả sử '2' là ID của Danh Mục 2
('Sản Phẩm 3', 200000, 20, 'Mô tả sản phẩm 3', 'hinh3.jpg', 3); -- Giả sử '3' là ID của Danh Mục 3

-- Chèn dữ liệu vào bảng ChiTietPhieuNhap
INSERT INTO ChiTietPhieuNhap (maPN, maSanPham, soLuongNhap, giaNhap) VALUES
(1, 1, 20, 90000), -- Giả sử '1' là ID của Phiếu Nhập 1 và '1' là ID của Sản Phẩm 1
(2, 2, 15, 130000), -- Giả sử '2' là ID của Phiếu Nhập 2 và '2' là ID của Sản Phẩm 2
(3, 3, 10, 180000); -- Giả sử '3' là ID của Phiếu Nhập 3 và '3' là ID của Sản Phẩm 3

-- Chèn dữ liệu vào bảng DonHang
INSERT INTO DonHang (ngayTaoDon, diachiGiaoHang, SDTGiaoHang, maHoaDonDienTu, ngayThanhToan, ngayGiaoHang, trangthaiHoaDon, khachhang_id, admin_id, ghiChu) VALUES
('2023-11-18 15:00:00', 'Địa chỉ 1', '0123456789', 'HD001', '2023-11-19', '2023-11-20', 'Đã thanh toán', 1, 1, 'Ghi chú đơn hàng 1'),
('2023-11-19 10:30:00', 'Địa chỉ 2', '0987654321', 'HD002', '2023-11-20', '2023-11-21', 'Chưa thanh toán', 2, 2, 'Ghi chú đơn hàng 2'),
('2023-11-20 12:45:00', 'Địa chỉ 3', '0123456789', 'HD003', '2023-11-21', '2023-11-22', 'Chưa thanh toán', 3, 3, 'Ghi chú đơn hàng 3');

-- Chèn dữ liệu vào bảng ChiTietDonHang
INSERT INTO ChiTietDonHang (maDonHang, maSanPham, soLuongDat, donGiaDat, ghiChu) VALUES
('HD001', 1, 10, 100000, 'Ghi chú sản phẩm trong đơn hàng 1'), -- Giả sử 'HD001' là Mã đơn hàng 1 và '1' là ID của Sản Phẩm 1
('HD002', 2, 8, 150000, 'Ghi chú sản phẩm trong đơn hàng 2'), -- Giả sử 'HD002' là Mã đơn hàng 2 và '2' là ID của Sản Phẩm 2
('HD003', 3, 5, 200000, 'Ghi chú sản phẩm trong đơn hàng 3'); -- Giả sử 'HD003' là Mã đơn hàng 3 và '3' là ID của Sản Phẩm 3







INSERT INTO SanPham (tenSanPham, donGia, soluongHienCon, moTa, hinhAnh, maDanhMuc) VALUES
('Cải kale hữu cơ - 250g', 62500, 150, 'Cải Kale là một loại rau với lá xanh, có họ gần với bắp cải hơn các loại rau trồng khác. Với đặc tính khá cứng nên phải nấu khá lâu mới mềm (như rau ngót). Cải Kale rất giàu chất xơ, canxi cùng nhiều vitamin (như vitamin C, A, K…) và khoáng chất có lợi khác(như sắt, canxi, kali, mangan và phốt pho…).', 'CaiKale.jpg', 1), -- Giả sử '1' là ID của Danh Mục 1
('Khổ qua hữu cơ - 300g', 34500, 90, 'Trên lâm sàng, khổ qua thường dùng chữa các chứng do bệnh nhiệt gây thử nhiệt phiền khát, trúng thử (say nóng), ung sưng, mắt đỏ đau nhức, kiết lỵ, viêm quầng, nhọt độc, tiểu ít… Khổ qua (mướp đắng) – Momordia charantia L. thuộc họ Hồ lô (Cucurbitaceae). Vị đắng, tính mát, không độc. Vào kinh tâm, can, tỳ và vị.', 'KhoQua.jpg', 1), -- Giả sử '2' là ID của Danh Mục 2
('Cà chua bee ngọt hữu cơ - 300g', 56700, 120, 'Cà chua bi rất giàu vitamin C, vitamin A và canxi. Những lợi ích sức khỏe của chúng là chất chống oxy hóa đáng chú ý và phòng chống ung thư. Theo WHFoods, trong một nghiên cứu 14 tháng,trên Tạp chí của Viện Ung thư Quốc gia tìm thấy cà chua đóng một vai trò quan trọng trong việc phòng ngừa ung thư tuyến tiền liệt. Cà chua chứa lycopene, chất có liên quan đến công tác phòng chống bệnh tim. Nó cũng có chức năng như một chất chống oxy hóa giúp bảo vệ tế bào.', 'CaChua.jpg', 1); -- Giả sử '3' là ID của Danh Mục 3
('Đọt rau lang hữu cơ - 300g', 38000, 0, 'Rau khoai lang là thứ rau dân dã trước đây chỉ dành cho nhà nghèo. Ngày nay, người ta đã "phát hiện" ra rằng thứ rau này cũng rất ngon và có nhiều tác dụng đối với sức khỏe. Ở một số nước như châu Âu, Hồng Kông, Nhật Bản... rau khoai lang không còn là loại rau dân dã mà đã trở thành một loại thực phẩm cao cấp có mặt trong những nhà hàng sang trọng. Đây là một loại thực phẩm bổ dưỡng hơn nhiều lần so với những gì người ta vẫn nghĩ về loại rau này. Trong y học cổ truyền, rau khoai lang đã được coi là một vị thuốc với nhiều tên gọi khác nhau như cam thử, phiên chử, là một loại rau có tính bình, vị ngột, ích khí hư... Rau khoai lang không độc, tư thận âm, chữa tỳ hư, tác dụng bồi bổ sức khỏe, thanh can, lợi mật, giúp tăng cường thị lực, chữa bệnh vàng da, phụ nữ kinh nguyệt không đều, nam giới di tinh... Các nhà khoa học phát hiện ra rằng dinh dưỡng trong rau khoai lang còn tốt hơn trong củ khoai lang rất nhiều. Ví dụ: Vitamin B6 trong lá khoai lang cao gấp 3 lần trong củ khoai, vitamin C cao gấp 5 lần, viboflavin cao gấp 10 lần. Dinh dưỡng trong lá khoai lang tương đương với một loại "siêu" thực phẩm là rau chân vịt, nhưng lượng axit axalic trong rau khoai lang ít hơn rất nhiều lần so với rau chân vịt, vì thế nguy cơ gây bệnh sỏi thận của rau khoai lang cũng ít hơn.', 'RauLang.jpg', 1); -- Giả sử '3' là ID của Danh Mục 3
('Đậu cove hữu cơ - 300g', 37500, 20, ' Đậu cove thuộc họ đâu, có thân nhỏ tròn và dài như chiếc đũa, đậu có màu xanh nhạt khi còn non và xanh lục khi chín. Loại đậu này tính ôn, có tác dụng nhuận tràng, bồi bổ nguyên khí. Đậu cô ve không chỉ có chứa nhiều nguyên tố vi lượng như protein, canxi, sắt, mà còn có nhiều kali, magie, ít natri. Đậu cô ve rất thích hợp với những người bị bệnh tim, thận, cao huyết áp. Khi ăn cần chú ý nấu chín, nếu không dễ bị ngộ độc.', 'DauCoVe.jpg', 1); -- Giả sử '3' là ID của Danh Mục 3
('Cải bó xôi hữu cơ - 250g', 43500, 180, 'Cải bó xôi còn gọi là rau chân vịt, ba thái, có tên khoa học là Spinacia oleracea L. Chenopodiaceae. Cải bó xôi thường có cuống nhỏ và lá xanh đậm, lá mọc chụm lại ở một gốc bé xíu. Thân và lá dòn, dễ gãy, dập. Cải bó xôi không những là một món ăn ngon mà còn có tác dụng rất “thần kỳ” trong y học để phòng và chữa nhiều bệnh ', 'CaiBoSoi.jpg', 1); -- Giả sử '3' là ID của Danh Mục 3
('Bí ngòi xanh hữu cơ - 300g', 34500, 50, 'Bí ngòi xanh là loại trái thuộc họ bầu bí, thân tròn, dài, bên ngoài bí có màu xanh sậm, có ít vân. CÔNG DỤNG Bí ngòi nói chung giúp chữa các bệnh về hô hấp như hen suyễn, giúp tránh nhồi máu cơ tim và đột quỵ, ngăn ngừa cá bệnh về hoại huyết, thâm tím bị gây ra do thiếu hụt vitamin C. Bí ngòi còn giúp tăng khả năng ngăn ngừa chứng đa xơ cứng, ung thư ruột già, ngăn xơ vữa động mạch, làm hạ huyết áp. Một số công dụng khác như : Chống lão hóa, tăng cường trí nhớ và làm thuyên giảm những chứng bệnh liên quan đến lão hóa. Bí ngòi còn có tác dụng giảm cân vì các chất dinh dưỡng trong bí ngòi cũng có tác dụng làm tăng chuyển hóa, đồng thời loại quả này 90% là nước và có hàm lượng  calorie thấp nên giảm cân hiệu quả. ', 'BiNgoi.jpg', 1); -- Giả sử '3' là ID của Danh Mục 3
('Rau ngót ta hữu cơ - 300g', 43000, 70, ' Rau ngót tính mát lạnh (nấu chín sẽ bớt lạnh), vị ngọt. Có công năng thanh nhiệt, giải độc, lợi tiểu, tăng tiết nước bọt, hoạt huyết hoá ứ, bổ huyết, cầm huyết, nhuận tràng, sát khuẩn, tiêu viêm, sinh cơ, có nhiều tác dụng chữa bệnh.', 'RauNgot.jpg', 1); -- Giả sử '3' là ID của Danh Mục 3
('Cải bẹ trắng hữu cơ - 300g', 29400, 0, 'Cải bẹ trắng có hình dáng gần giống cải thìa nhưng cuốn của nó màu trắng sữa. Cải bẹ trắng thường dùng đễ chế biến : nấu canh, hấp cá, ăn lẩu, ăn sống, trộn dầu giắm ăn như xà lách, muối dưa. Thành phần dinh dưỡng trong 100g rau cải bẹ trắng ăn được trong đó có nước 92%, đạm 1,5%, chất béo 0,0%, chất bột 1,5%, chất xơ 1,5%, chữa nhiều vitamin khác. Cải bẹ trắng là loại rau được nhiều người sử dụng, có vị cay tính mát, thanh phề, tiêu đàm những người ho khan, bụng đầy chậm tiêu do tỳ. phế nhiệt dùng đều tốt.', 'CaiBeTrang.jpg', 1); -- Giả sử '3' là ID của Danh Mục 3
('Bắp tím nữ hoàng - 500g', 54500, 0, 'Bắp nữ hoàng là giống bắp ngọt, có nguồn gốc từ Thái Lan, được nhập về Việt Nam và trồng nhiều ở khu vực Đông Nam Bộ cùng với đồng bằng sông Cửu Long. Được trồng theo quy trình chuẩn hữu cơ', 'Bap.jpg', 1); -- Giả sử '3' là ID của Danh Mục 3


INSERT INTO SanPham (tenSanPham, donGia, soluongHienCon, moTa, hinhAnh, maDanhMuc) VALUES
('Tôm thẻ thịt sinh thái hữu cơ Seaprpdex 250g size 21/25 con', 154000, 50, 'Tôm dường như là món ăn không thể thiếu cho bữa tiệc gia đình hay mâm cỗ thêm phần sang trọng, đẹp mắt. Không chỉ đẹp món tôm còn có hương vị hấp dẫn cũng như là giá trị dinh dưỡng cao, tốt cho sức khỏe. Tôm thẻ thịt sinh thái Seaprodex - Túi 250g - Kích cỡ 21/25 là sản phẩm tôm hữu cơ, cho hương vị nguyên bản và đảm bảo sức khỏe cho mọi người.', 'Tom.jpg', 2), -- Giả sử '1' là ID của Danh Mục 1
('Gầu bò Úc tươi hữu cơ Obe 300g', 204000, 80, 'Gầu bò Úc tươi hữu cơ Obe mềm mọng, được cắt thái theo yêu cầu của khách hàng, dễ dàng chế biến thành nhiều món ăn hấp dẫn', 'BoUc.jpg', 2), -- Giả sử '2' là ID của Danh Mục 2
('Mực lá làm sạch gói 450g', 270000, 100, 'Đây là loại mực mang chất giòn, ngọt. Những ai thích ăn mực giòn và dày thịt thì chọn loại này', 'Muc.jpg', 2); -- Giả sử '3' là ID của Danh Mục 3
('Cá diêu hồng phile 500g', 175000, 50, 'Cá diêu hồng còn được gọi là cá rô phi đỏ, một loài cá nước ngọt, bên ngoài phủ vảy màu đỏ hồng hoặc vàng đậm, có thịt dày và ngọt. Cá diêu hồng nhận sự quan tâm, yêu thích của nhiều người bởi cá không quá nhiều xương, độ tươi ngon của phần thịt khi chế biến món ăn và giá trị dinh dưỡng mà nó đem lại. Cá diêu hồng tại Organicfood.vn được nuôi tự nhiên tại hồ Trị An, Đồng Nai.', 'CaDieuHong.jpg', 2), -- Giả sử '1' là ID của Danh Mục 1
('Tôm Tích Tách Nõn Hấp Chín Gói 500gr', 329000, 0, 'Tôm tích, tôm tít, tôm thuyền, bề bề hay tôm búa, bàn chải. Rải đều mõi vùng miền biển lại có tên gọi khác nhau nhưng có đặc điểm chung là thịt tôm tích rất ngon, ngọt, hiền lành vừa đậm đà hương biển. Có một số nơi ngư dân đánh bắt được chỉ để dành chờ khách quý đến đãi ăn, coi như là hải sản quí hiếm mà biển cả bàn tặng.', 'TomTich.jpg', 2), -- Giả sử '2' là ID của Danh Mục 2
('Cá Hồi Tự Nhiên Nauy Phile 200g', 154000, 100, 'Cá hồi Nauy được nuôi trong môi trường biển tự nhiên của Nauy nằm ở Bắc Đại Tây Dương. Quá trình chăn nuôi được quản lý nghiêm ngặt từ khi chúng còn trong trứng tới khi trưởng thành, nguồn Protein cung cấp từ thức ăn cho cá đảm bảo an toàn và lành mạnh giữ cho cá hồi sạch cũng như tác động tới môi trường biển là nhỏ nhất. Những farm nuôi cá hồi Nauy của Salmar được đặt tại vùng biển phía Bắc Đại Tây Dương có khí hậu lạnh quanh năm, nằm giữa các dãy núi tuyết, có nguồn nước trong và sạch cùng môi trường tự nhiên lý tưởng tạo nên điều kiện sống thuận lợi cho cá hồi phát triển với chất lượng cao nhất.', 'CaHoi.jpg', 2); -- Giả sử '3' là ID của Danh Mục 3
('Tôm Sú Sinh Thái Nguyên Con Hữu Cơ Seaprodex - 500g', 239000, 30, 'Sử dụng con giống được chứng nhận sinh thái, thả thưa dưới những tán rừng đước xanh ngắt. Thức ăn tự nhiên dồi dào một phần nhờ vào các dòng thủy triều mang theo các loài phiêu sinh động vật, phiêu sinh thực vật vào vuông tôm - là nguồn thức ăn của tôm nên không cần phải sử dụng thức ăn công nghiệp', 'TomSu.jpg', 2), -- Giả sử '1' là ID của Danh Mục 1
('Cua đồng tinh chế vinacua 150g', 59000, 30, 'Thịt cua đồng tinh chế không cần xay, giã ,lọc. Thành phần: thịt cua đồng tinh chế (đã giã và tách bỏ toàn bộ bã và vỏ), muối, túi gạchCông dụng: Dùng để nấu canh cua, bún riêu cua,canh bánh đa... HSD: Hạn sử dụng 1 năm và sử dụng trong vòng 1 tháng. Bảo quản ở 18 độ C', 'CuaDong.jpg', 2), -- Giả sử '2' là ID của Danh Mục 2
('Cá Tuyết Alaska Fillet 300g', 276000, 200, 'Cá Tuyết là dòng cá biển thịt trắng rất được ưa chuộng ở thị trường Bắc Mỹ, Châu Âu và ngày càng trở nên nổi tiếng ở Châu Á vì hương vị đặc trưng đậm đà, tươi ngon và dinh dưỡng cao, phù hợp để chế biến tất cả món ăn ngon từ phong cách Âu sang Á. Quý khách có thể tham khảo 1 số món ngon từ Cá Tuyết Alaska dưới đây để bữa ăn thêm dinh dưỡng và đặc sắc.', 'CaTuyet.jpg', 2); -- Giả sử '3' là ID của Danh Mục 3
('Cá thu atka xẻ bướm 280g', 134000, 90, 'Cá Thu Atka Nhật Bản là món ăn bổ dưỡng được người Nhật yêu thích và là một trong những bí quyết làm nên ẩm thực của đất nước có tuổi thọ bình quân cao nhất thế giới. ', 'CaThuXeBuom.jpg', 2), -- Giả sử '1' là ID của Danh Mục 1
