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
						<div class="module-body table" id="agentData">
							<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Agent code</th>
										<th scope="col">Agent name</th>
										<th scope="col">Working area</th>
										<th scope="col">Commission</th>
										<th scope="col">Phone</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@php
									$x = 1;
									foreach($agents as $agent) :
									@endphp
									<tr>
										<th scope="row">{{ $x++ }}</th>
										<td>{{ $agent->AGENT_CODE }}</td>
										<td>{{ $agent->AGENT_NAME }}</td>
										<td>{{ $agent->WORKING_AREA }}</td>
										<td>{{ $agent->COMMISSION }}</td>
										<td>{{ $agent->PHONE_NO }}</td>
										<td>
											@if($agent->STATUS == '1')
											<button data-id="{{ $agent->AGENT_CODE }}" type="button" onclick="disableAgent(this)" class="btn btn-sm btn-danger">Disable</button>
											@else
											<button data-id="{{ $agent->AGENT_CODE }}" type="button" onclick="enableAgent(this)" class="btn btn-sm btn-primary">Enable</button>
											@endif
										</td>
									</tr>
									@php
									endforeach;
									@endphp
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