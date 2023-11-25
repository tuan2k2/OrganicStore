require('./bootstrap');

                                document.addEventListener("DOMContentLoaded", function() {
                                    var select = document.querySelector('.select-filter');

                                    select.addEventListener('change', function() {
                                        var selectedValue = this.value;

                                        if (selectedValue !== "0") {
                                            window.location.href = selectedValue; // Chuyển hướng đến URL đã chọn
                                        } else {
                                            alert('Hãy lọc sản phẩm');
                                        }
                                    });
                                });