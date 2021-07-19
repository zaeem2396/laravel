@include("inc.header")
<div class="wrapper">
	<div class="container">
		<div class="row">
			@include("inc.sidebar")
			<!--/.span3-->


			<div class="span9">
				<div class="content">
					<div class="module">
						<div class="module-head">
							<h3>DataTables</h3>
						</div>
						<div class="module-body table">
							<table id="agentData" cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Agent code</th>
										<th scope="col">Agent name</th>
										<th scope="col">Working area</th>
										<th scope="col">Commission</th>
										<th scope="col">Phone</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
					<!--/.module-->

					<br />

				</div>
				<!--/.content-->
			</div>
			<!--/.span9-->
		</div>
	</div>
	<!--/.container-->
</div>
<!--/.wrapper-->

@include("inc.footer")
</body>