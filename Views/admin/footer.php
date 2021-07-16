<?php 
	if (isset($_GET['selectedId']))
	{
		$id = $_GET['selectedId'];
		$name = $_GET['name'];
	}
?>	
				<!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="<?php if (isset($_GET['action'])) echo 'false'; else echo 'true';?>">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Xóa người dùng này?</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Khi xác nhận xóa sẽ không thể khôi phục!</div>
							<div class="modal-body">Mã người dùng: <?php echo $id; ?></div>
							<div class="modal-body">Tên người dùng: <?php echo $name; ?></div>

							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
								<a class="btn btn-primary" href="">Xác nhận</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./Content/vendor/jquery/jquery.min.js"></script>
    <script src="./Content/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./Content/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./Content/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./Content/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./Content/js/demo/chart-area-demo.js"></script>
    <script src="./Content/js/demo/chart-pie-demo.js"></script>

</body>

</html>