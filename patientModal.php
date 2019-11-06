<!-- Add Modal -->
<div class="myModal" ng-show="AddPatientModal">
	<div class="modalContainer">
		<div class="modalHeader">
			<span class="headerTitle">Add New Patient</span>
			<button class="closeBtn pull-right" ng-click="AddPatientModal = false"></button>
		</div>
		<div class="modalBody">
			<div class="form-group">
				<label>Firstname:</label>
				<input type="text" class="form-control" ng-model="pFirstName" id="pFirstName">
				<span class="pull-right input-error" ng-show="errorFirstname">{{ errorMessage }}</span>
			</div>
			<div class="form-group">
				<label>Lastname:</label>
				<input type="text" class="form-control" ng-model="pLastName" id="pLastName">
				<span class="pull-right input-error" ng-show="errorLastname">{{ errorMessage }}</span>
			</div>
			<div class="form-group">
				<label>Address:</label>
				<input type="text" class="form-control" ng-model="address" id="address">
				<span class="pull-right input-error" ng-show="errorAddress">{{ errorMessage }}</span>
			</div>
			<div class="form-group">
				<label>Contact No.:</label>
				<input type="text" class="form-control" ng-model="contactNo" id="contactNo">
				<span class="pull-right input-error" ng-show="errorcontactNo">{{ errorMessage }}</span>
			</div>
			<div class="form-group">
				<label>Status:</label>
				<input type="text" class="form-control" ng-model="status" id="status">
				<span class="pull-right input-error" ng-show="errorStatus">{{ errorMessage }}</span>
			</div>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" ng-click="AddPatientModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-primary" ng-click="addnewpatient()"><span class="glyphicon glyphicon-floppy-disk"></span> Add</button>
			</div>
		</div>
	</div>
</div>

<!-- Edit Modal -->
<div class="myModal" ng-show="EditModal">
	<div class="modalContainer">
		<div class="editHeader">
			<span class="headerTitle">Edit Patient</span>
			<button class="closeEditBtn pull-right" ng-click="EditModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<div class="form-group">
				<label>Firstname:</label>
				<input type="text" class="form-control" ng-model="clickPatient.firstname">
			</div>
			<div class="form-group">
				<label>Lastname:</label>
				<input type="text" class="form-control" ng-model="clickPatient.lastname">
			</div>
			<div class="form-group">
				<label>Address:</label>
				<input type="text" class="form-control" ng-model="clickPatient.address">
			</div>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" ng-click="EditModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-success" ng-click="EditModal = false; updatePatient();"><span class="glyphicon glyphicon-check"></span> Save</button>
			</div>
		</div>
	</div>
</div>

<!-- Delete Modal -->
<div class="myModal" ng-show="DeleteModal">
	<div class="modalContainer">
		<div class="deleteHeader">
			<span class="headerTitle">Delete Patient</span>
			<button class="closeDelBtn pull-right" ng-click="DeleteModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<h5 class="text-center">Are you sure you want to delete patient</h5>
			<h2 class="text-center">{{clickPatient.firstname}} {{clickpatient.lastname}}</h2>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" ng-click="DeleteModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-danger" ng-click="DeleteModal = false; deletePatient(); "><span class="glyphicon glyphicon-trash"></span> Yes</button>
			</div>
		</div>
	</div>
</div>
