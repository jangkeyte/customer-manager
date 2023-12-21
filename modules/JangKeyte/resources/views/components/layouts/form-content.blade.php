<form method="POST" action="https://crm.website.name.vn/admin/leads/create" enctype="multipart/form-data">
	<div class="page-content">
		<div class="form-container">
			<div class="panel">
				<div class="panel-header">
					<button type="submit" class="btn btn-md btn-primary"> Lưu Khách hàng tiềm năng </button> <a href="https://crm.website.name.vn/admin/leads">Quay lại</a></div>
				<input type="hidden" name="_token" value="n6AHP8Vf7NpwRV1445fmmUKlni5NoobaQgbDyyzZ">
				<input type="hidden" id="lead_pipeline_stage_id" name="lead_pipeline_stage_id" value="">
				<div>
					<div class="tabs">
						<ul>
							<li class="active"><a>Chi tiết</a></li>
							<li class=""><a>Người liên hệ</a></li>
							<li class=""><a>Danh sách sản phẩm</a></li>
						</ul>
					</div>
					<div class="tabs-content">
						<div style="">
							<div class="form-group text">
								<label for="title" class="required"> Title </label>
								<input type="text" name="title" id="title" value="" data-vv-as="&quot;Title&quot;" class="control" aria-required="true" aria-invalid="true">
								<!---->
							</div>
							<div class="form-group textarea">
								<label for="description"> Description </label>
								<textarea name="description" class="control" id="description" v-validate="''" data-vv-as="&quot;Description&quot;"></textarea>
								<!---->
							</div>
							<div class="form-group price">
								<label for="lead_value" class="required"> Lead Value <span class="currency-code">(US$)</span></label>
								<input type="text" name="lead_value" id="lead_value" value="" data-vv-as="&quot;Lead Value&quot;" class="control" aria-required="true" aria-invalid="true">
								<!---->
							</div>
							<div class="form-group select">
								<label for="lead_source_id" class="required"> Source </label>
								<select id="lead_source_id" name="lead_source_id" data-vv-as="&quot;Source&quot;" class="control" aria-required="true" aria-invalid="true">
									<option value="" selected="selected" disabled="disabled">Select</option>
									<option value="1"> Email </option>
									<option value="2"> Website </option>
									<option value="3"> Form liên hệ trên Website </option>
									<option value="4"> Điện thoại </option>
									<option value="5"> Trực tiếp </option>
								</select>
								<!---->
							</div>
							<div class="form-group select">
								<label for="lead_type_id" class="required"> Type </label>
								<select id="lead_type_id" name="lead_type_id" data-vv-as="&quot;Type&quot;" class="control" aria-required="true" aria-invalid="true">
									<option value="" selected="selected" disabled="disabled">Select</option>
									<option value="1"> Doanh nghiệp mới </option>
									<option value="2"> Doanh nghiệp hiện tại </option>
								</select>
								<!---->
							</div>
							<div class="form-group select">
								<label for="user_id"> Sales Owner </label>
								<select id="user_id" name="user_id" data-vv-as="&quot;Sales Owner&quot;" class="control" aria-required="false" aria-invalid="false">
									<option value="" selected="selected" disabled="disabled">Select</option>
									<option value="1"> Quản trị viên tối cao </option>
								</select>
								<!---->
							</div>
							<div class="form-group date">
								<label for="expected_close_date"> Expected Close Date </label>
								<div class="date-container">
									<input type="text" name="expected_close_date" value="" data-vv-as="&quot;Expected Close Date&quot;" class="control flatpickr-input" aria-required="false" aria-invalid="false" autocomplete="off">
								</div>
								<!---->
							</div>
						</div>
						<div style="display: none;">
							<div class="contact-controls">
								<div class="form-group">
									<label for="person[name]" class="required">Tên</label>
									<input type="text" name="person[name]" id="person[name]" autocomplete="off" placeholder="Bắt đầu nhập để tìm kiếm bản ghi" data-vv-as="&quot;Tên&quot;" class="control" aria-required="true" aria-invalid="false">
									<!---->
									<div class="lookup-results">
										<ul>
											<!---->
											<!---->
										</ul>
									</div>
									<!---->
								</div>
								<div class="form-group email">
									<label for="person[emails]" class="required">Email</label>
									<div class="emails-control">
										<div class="form-group input-group">
											<input type="text" name="person[emails][0][value]" data-vv-as="Email" class="control" aria-required="true" aria-invalid="false">
											<div class="input-group-append">
												<select name="person[emails][0][label]" class="control">
													<option value="work">Công việc</option>
													<option value="home">Trang chủ</option>
												</select>
											</div>
											<!---->
											<!---->
										</div> <a href="" class="add-more-link">+ Bổ sung thêm</a></div>
								</div>
								<div class="form-group contact-numbers">
									<label for="person[contact_numbers]">Số liên lạc</label>
									<div class="phone-control">
										<div class="form-group input-group">
											<input type="text" name="person[contact_numbers][0][value]" data-vv-as="Contact Numbers" class="control" aria-required="false" aria-invalid="false">
											<div class="input-group-append">
												<select name="person[contact_numbers][0][label]" class="control">
													<option value="work">Công việc</option>
													<option value="home">Trang chủ</option>
												</select>
											</div>
											<!---->
											<!---->
										</div> <a href="" class="add-more-link">+ Bổ sung thêm</a></div>
								</div>
								<div class="form-group organization">
									<label for="address">Tổ chức</label>
									<div class="lookup-control">
										<div class="form-group" style="margin-bottom: 0px;">
											<input type="text" name="person[organization_id]" id="person[organization_id]" for="person[organization_id]" placeholder="Bắt đầu nhập để tìm kiếm bản ghi" autocomplete="off" data-vv-as="Organization" class="control" aria-required="false" aria-invalid="false">
											<input type="hidden" name="person[organization_id]" data-vv-as="Organization" aria-required="false" aria-invalid="false">
											<div class="lookup-results">
												<ul>
													<!---->
												</ul>
											</div>
											<!---->
										</div>
									</div>
								</div>
							</div>
						</div>
						<div style="display: none;">
							<div class="lead-product-list"> <a href="" class="add-more-link">+ Bổ sung thêm</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>