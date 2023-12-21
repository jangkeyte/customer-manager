<!-- main content -->
<div class="content-container" style="padding-left: 160px;">
	<div class="content full-page">
		<div class="table" switch-page-url="https://crm.website.name.vn/admin/leads">
			<div class="table-header">
				<h1><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="https://crm.website.name.vn/admin/dashboard">Điều khiển</a></li> <li aria-current="page" class="breadcrumb-item active">Khách hàng</li></ol></nav>
                    Khách hàng tiềm năng              
                </h1>
				<div class="table-action"><span class="export-import"><i class="icon export-icon"></i> <span data-v-054c4df7="">Export</span></span> <a href="https://crm.website.name.vn/admin/leads/create" class="btn btn-md btn-primary">Tạo mới Khách hàng tiềm năng</a></div>
			</div>
			<div class="sidebar-filter">
				<header>
					<h1>
                        <span>Filter</span> 
                        <div class="right">
                        <label>Remove All</label> 
                        <i class="icon close-icon"></i>
                        </div>
                    </h1>
                </header>
				<div class="form-group ">
					<label>ID</label>
					<div class="field-container"><span class="control"><i class="icon add-icon"></i> ID
                        </span>
						<div class="selected-options"></div> <i class="icon close-icon"></i></div>
				</div>
				<div class="form-group ">
					<label>Sales Person</label>
					<div class="field-container">
						<select class="control">
							<option disabled="disabled" value=""> Chọn người dùng </option>
							<option value="1"> Quản trị viên tối cao </option>
						</select>
						<div class="selected-options"></div> <i class="icon close-icon"></i></div>
				</div>
				<div class="form-group ">
					<label>Subject</label>
					<div class="field-container"><span class="control"><i class="icon add-icon"></i> Subject
                        </span>
						<div class="selected-options"></div> <i class="icon close-icon"></i></div>
				</div>
				<div class="form-group ">
					<label>Tags</label>
					<div class="field-container"><span class="control"><i class="icon add-icon"></i> Tags
                        </span>
						<div class="selected-options"></div> <i class="icon close-icon"></i></div>
				</div>
				<div class="form-group ">
					<label>Nguồn Khách hàng tiềm năng</label>
					<div class="field-container">
						<select class="control">
							<option disabled="disabled" value=""> Chọn người dùng </option>
							<option value="1"> Email </option>
							<option value="2"> Website </option>
							<option value="3"> Form liên hệ trên Website </option>
							<option value="4"> Điện thoại </option>
							<option value="5"> Trực tiếp </option>
						</select>
						<div class="selected-options"></div> <i class="icon close-icon"></i></div>
				</div>
				<div class="form-group ">
					<label>Lead Value</label>
					<div class="field-container"><span class="control"><i class="icon add-icon"></i> Lead Value
                        </span>
						<div class="selected-options"></div> <i class="icon close-icon"></i></div>
				</div>
				<div class="form-group ">
					<label>Contact Person</label>
					<div class="field-container"><span class="control"><i class="icon add-icon"></i> Contact Person
                        </span>
						<div class="selected-options"></div> <i class="icon close-icon"></i></div>
				</div>
				<div class="form-group ">
					<!---->
					<div class="field-container">
						<!---->
						<!---->
					</div>
				</div>
				<div class="form-group ">
					<label>Rotten Lead</label>
					<div class="field-container">
						<select class="control">
							<option disabled="disabled" value=""> Lựa chọn các phương án </option>
							<option value="0"> Không </option>
							<option value="1"> Vâng </option>
						</select>
						<div class="selected-options"></div> <i class="icon close-icon"></i></div>
				</div>
				<div class="form-group date">
					<label>Expected Close Date</label>
					<div class="field-container">
						<div id="dateRange9" class="form-group date">
							<div class="date-container">
								<input type="text" placeholder="Start Date" class="control half flatpickr-input">
							</div> <span class="middle-text">to</span>
							<div class="date-container">
								<input type="text" placeholder="End Date" class="control half flatpickr-input">
							</div>
						</div> <i class="icon close-icon"></i></div>
				</div>
				<div class="form-group date">
					<label>Created Date</label>
					<div class="field-container">
						<div id="dateRange10" class="form-group date">
							<div class="date-container">
								<input type="text" placeholder="Start Date" class="control half flatpickr-input">
							</div> <span class="middle-text">to</span>
							<div class="date-container">
								<input type="text" placeholder="End Date" class="control half flatpickr-input">
							</div>
						</div> <i class="icon close-icon"></i></div>
				</div>
			</div>
			<div class="table-body">
				<!---->
				<div class="grid-container">
					<div id="datagrid-filters" class="datagrid-filters">
						<div>
							<div class="search-filter form-group"><i class="icon search-icon input-search-icon"></i>
								<input type="search" id="search-field" placeholder="Search Here..." class="control">
							</div>
							<!---->
						</div>
						<div class="filter-right">
							<div class="dropdown-filters per-page">
								<div class="form-group">
									<label for="perPage" class="per-page-label"> Items Per Page </label>
									<select class="control" id="perPage" name="perPage">
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
										<option value="40">40</option>
										<option value="50">50</option>
									</select>
								</div>
							</div>
							<!---->
							<div class="switch-pipeline-container">
								<div class="form-group">
									<select onchange="window.location.href = this.value" class="control">
										<option value="https://crm.website.name.vn/admin/leads/1?view_type=table" selected="selected"> Quy trình mặc định </option>
									</select>
								</div>
							</div>
							<div class="switch-view-container"><a href="https://crm.website.name.vn/admin/leads" class="icon-container"><i class="icon layout-column-line-icon"></i></a> <a class="icon-container active"><i class="icon table-line-active-icon"></i></a></div>
							<div class="filter-btn" style="display: inline-block;">
								<div class="grid-dropdown-header"><span class="name">
                        Filter
                    </span> <i class="icon add-icon"></i></div>
							</div>
						</div>
					</div>
					<div class="tabs-container">
						<div class="pill tabs-left-container">
							<div class="tabs">
								<ul>
									<li class="active"><a>All</a></li>
									<li class=""><a>New</a></li>
									<li class=""><a>Theo sát</a></li>
									<li class=""><a>Tiềm năng</a></li>
									<li class=""><a>Đàm phán</a></li>
									<li class=""><a>Won</a></li>
									<li class=""><a>Lost</a></li>
								</ul>
							</div>
							<!---->
						</div>
						<div class="tabs-right-container">
							<section>
								<div class="pagination tab-view"><a class="page-item previous disabled"><i class="icon arrow-left-line-icon"></i></a> <a class="page-item next disabled"><i class="icon arrow-right-line-icon"></i></a></div>
							</section>
							<!---->
							<div class="custom-design-container dropdown-list" style="display: none;">
								<label> Date Range </label> <i data-close-container="true" class="icon close-icon"></i>
								<div id="dateRangeduration" class="form-group date">
									<div class="date-container">
										<input type="text" placeholder="Start Date" class="control half flatpickr-input">
									</div> <span class="middle-text">to</span>
									<div class="date-container">
										<input type="text" placeholder="End Date" class="control half flatpickr-input">
									</div>
								</div>
								<button type="button" data-close-container="true" class="btn btn-sm btn-primary"> Done </button>
							</div>
						</div>
					</div>
					<div class="filtered-tags">
						<!---->
					</div>
				</div>
				<table data-v-054c4df7="">
					<thead data-v-054c4df7="">
						<tr>
							<th class="master-checkbox"><span class="checkbox"><input type="checkbox"> <label for="checkbox" class="checkbox-view"></label></span></th>
							<th class="id cursor-pointer">ID</th>
							<th class="sales_person cursor-pointer">Sales Person</th>
							<th class="title cursor-pointer">Subject</th>
							<!---->
							<th class="lead_source_name cursor-pointer">Nguồn Khách hàng tiềm năng</th>
							<th class="lead_value cursor-pointer">Lead Value</th>
							<th class="person_name">Contact Person</th>
							<th class="stage">Stage</th>
							<th class="rotten_lead cursor-pointer">Rotten Lead</th>
							<th class="expected_close_date cursor-pointer">Expected Close Date</th>
							<th class="created_at cursor-pointer">Created Date</th>
							<th class="actions"> Actions </th>
						</tr>
					</thead>
					<tbody data-v-054c4df7="">
						<tr class="">
							<td><span class="checkbox"><input type="checkbox" id="checkbox-1"> <label for="checkbox" class="checkbox-view"></label></span></td>
							<td title="">1</td>
							<td title=""><a href="https://crm.website.name.vn/admin/settings/users?id[eq]=1">Quản trị viên tối cao</a></td>
							<td title="">Nguyễn Kinh Luân</td>
							<!---->
							<td title="">Website</td>
							<td title="">100.000.000,00&nbsp;US$</td>
							<td title=""><a href="https://crm.website.name.vn/admin/contacts/persons?id[eq]=1">Nguyễn Kinh Luân</a></td>
							<td title=""><span class="badge badge-round badge-primary"></span>New</td>
							<td title="">Không</td>
							<td title="">31 Dec 2023 12:00AM</td>
							<td title="">04 Dec 2023 12:21PM</td>
							<td class="action"><a target="_blank" href="https://crm.website.name.vn/admin/leads/view/1" title="Edit" data-action="https://crm.website.name.vn/admin/leads/view/1" data-method="GET"><i data-route="https://crm.website.name.vn/admin/leads/view/1" class="icon eye-icon"></i></a><a title="Delete" data-action="https://crm.website.name.vn/admin/leads/1" data-method="DELETE"><i data-route="https://crm.website.name.vn/admin/leads/1" class="icon trash-icon"></i></a></td>
						</tr>
						<!---->
					</tbody>
				</table>
			</div>
			<form method="POST" action="https://crm.website.name.vn/export?view_type=table">
				<!---->
			</form>
		</div>
	</div>
</div>