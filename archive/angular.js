var app = angular.module('app', ['angularUtils.directives.dirPagination']);
app.controller('patientdata', function ($scope, $http, $window) {

	$scope.sort = function (keyname) {
		$scope.sortKey = keyname;
		$scope.reverse = !$scope.reverse;
	}

	$scope.clearMessage = function () {
		$scope.success = false;
		$scope.error = false;
	}

	//PATIENTS
	$scope.AddPatientModal = false;
	$scope.EditPatientModal = false;
	$scope.DeletePatientModal = false;

	$scope.errorFirstname = false;

	$scope.showAddPatient = function () {
		$scope.pFirstName = null;
		$scope.pLastName = null;
		$scope.address = null;
		$scope.contactNo = null;
		$scope.status = null;

		$scope.errorFirstname = false;
		$scope.errorLastname = false;
		$scope.errorAddress = false;
		$scope.errorContactNo = false;
		$scope.errorStatus = false;
		$scope.AddPatientModal = true;
	}

	$scope.fetchAllPatients = function () {
		$scope.ShowAllPatients = true;
		$scope.ShowHighRiskPatients = false;
		$scope.ShowNormalPatients = false;
		$http.get("fetchAllPatients.php").success(function (data) {
			$scope.patients = data;
		});
	}

	$scope.fetchHighRiskPatients = function () {
		$scope.ShowAllPatients = false;
		$scope.ShowHighRiskPatients = true;
		$scope.ShowNormalPatients = false;
		$http.get("fetchHighRiskPatients.php").success(function (data) {
			$scope.patients = data;
		});
	}

	$scope.fetchNormalPatients = function () {
		$scope.ShowAllPatients = false;
		$scope.ShowHighRiskPatients = false;
		$scope.ShowNormalPatients = true;
		$http.get("fetchNormalPatients.php").success(function (data) {
			$scope.patients = data;
		});
	}


	$scope.addnewpatient = function () {
		$http.post(
			"addPatient.php", {
			'pFirstName': $scope.pFirstName,
			'pLastName': $scope.pLastName,
			'address': $scope.address,
			'contactNo': $scope.contactNo,
			'status': $scope.status,
		}
		).success(function (data) {
			if (data.pFirstName) {
				$scope.errorFirstname = true;
				$scope.errorLastname = false;
				$scope.errorAddress = false;
				$scope.errorContactNo = false;
				$scope.errorStatus = false;
				$scope.errorMessage = data.message;
				$window.document.getElementById('pFirstName').focus();
			}
			else if (data.pLastName) {
				$scope.errorFirstname = false;
				$scope.errorLastname = true;
				$scope.errorAddress = false;
				$scope.errorContactNo = false;
				$scope.errorStatus = false;
				$scope.errorMessage = data.message;
				$window.document.getElementById('pLastName').focus();
			}
			else if (data.address) {
				$scope.errorFirstname = false;
				$scope.errorLastname = false;
				$scope.errorAddress = true;
				$scope.errorContactNo = false;
				$scope.errorStatus = false;
				$scope.errorMessage = data.message;
				$window.document.getElementById('address').focus();
			}
			else if (data.contactNo) {
				$scope.errorFirstname = false;
				$scope.errorLastname = false;
				$scope.errorAddress = false;
				$scope.errorContactNo = true;
				$scope.errorStatus = false;
				$scope.errorMessage = data.message;
				$window.document.getElementById('contactNo').focus();
			}
			else if (data.status) {
				$scope.errorFirstname = false;
				$scope.errorLastname = false;
				$scope.errorAddress = false;
				$scope.errorContactNo = false;
				$scope.errorStatus = true;
				$scope.errorMessage = data.message;
				$window.document.getElementById('status').focus();
			}
			else if (data.error) {
				$scope.errorFirstname = false;
				$scope.errorLastname = false;
				$scope.errorAddress = false;
				$scope.errorContactNo = false;
				$scope.errorStatus = false;
				$scope.error = true;
				$scope.errorMessage = data.message;
			}
			else {
				$scope.AddPatientModal = false;
				$scope.success = true;
				$scope.successMessage = data.message;
				$scope.fetchPatients();
			}
		});
	}

	$scope.selectPatient = function (patient) {
		$scope.clickPatient = patient;
	}

	$scope.showEdit = function () {
		$scope.EditModal = true;
	}

	$scope.updatePatient = function () {
		$http.post("edit.php", $scope.clickPatient)
			.success(function (data) {
				if (data.error) {
					$scope.error = true;
					$scope.errorMessage = data.message;
					$scope.fetch();
				}
				else {
					$scope.success = true;
					$scope.successMessage = data.message;
				}
			});
	}

	$scope.showDelete = function () {
		$scope.DeleteModal = true;
	}

	$scope.deletePatient = function () {
		$http.post("delete.php", $scope.clickPatient)
			.success(function (data) {
				if (data.error) {
					$scope.error = true;
					$scope.errorMessage = data.message;
				}
				else {
					$scope.success = true;
					$scope.successMessage = data.message;
					$scope.fetch();
				}
			});
	}

	//QUESTIONS
	$scope.AnswerQuestionModal = false;
	$scope.EditQuestionModal = false;
	$scope.DeleteQuestionModal = false;

	$scope.fetchAllQuestions = function () {
		$scope.ShowAllQuestions = true;
		$scope.ShowUnansweredQuestions = false;
		$scope.ShowAnsweredQuestions = false;
		$http.get("fetchAllQuestions.php").success(function (data) {
			$scope.questions = data;
		});
	}

	$scope.fetchUnansweredQuestions = function () {
		$scope.ShowAllQuestions = false;
		$scope.ShowUnansweredQuestions = true;
		$scope.ShowAnsweredQuestions = false;
		$http.get("fetchUnansweredQuestions.php").success(function (data) {
			$scope.questions = data;
		});
	}

	$scope.fetchAnsweredQuestions = function () {
		$scope.ShowAllQuestions = false;
		$scope.ShowUnansweredQuestions = false;
		$scope.ShowAnsweredQuestions = true;
		$http.get("fetchAnsweredQuestions.php").success(function (data) {
			$scope.questions = data;
		});
	}

	$scope.selectQuestion = function (question) {
		$scope.clickQuestion = question;
	}

	$scope.showAnswerModal = function () {
		$scope.AnswerQuestionModal = true;
	}

	$scope.answerQuestion = function () {
		$http.post("answerQuestion.php", $scope.clickQuestion)
			.success(function (data) {
				if (data.error) {
					$scope.error = true;
					$scope.errorMessage = data.message;
					$scope.fetchAllQuestions();
				}
				else {
					$scope.success = true;
					$scope.successMessage = data.message;
				}
			});
	}

	//VITALS
	$scope.fetchVitals = function () {
		$http.get("fetchVitals.php").success(function (data) {
			$scope.vitals = data;
		});
	}

});