<!-- Add Modal -->
<div class="myModal" ng-show="AnswerQuestionModal">
    <div class="modalContainer">
        <div class="editHeader">
            <span class="headerTitle">Answer Question</span>
            <button class="closeEditBtn pull-right" ng-click="AnswerQuestionModal = false">&times;</button>
        </div>
        <div class="modalBody">
            <div class="form-group">
                <label>Question:</label>
                <input type="text" class="form-control" ng-model="clickQuestion.question" disabled>
            </div>
			<div class="form-group">
				<label>Answer</label>
				<input type="text" class="form-control" ng-model="clickQuestion.answer">
			</div>
        </div>
        <hr>
        <div class="modalFooter">
            <div class="footerBtn pull-right">
                <button class="btn btn-default" ng-click="AnswerQuestionModal = false; clickQuestion.answer = null"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-success" ng-click="AnswerQuestionModal = false; answerQuestion();"><span class="glyphicon glyphicon-check"></span> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="myModal" ng-show="EditModal">
    <div class="modalContainer">
        <div class="editHeader">
            <span class="headerTitle">Edit Member</span>
            <button class="closeEditBtn pull-right" ng-click="EditModal = false">&times;</button>
        </div>
        <div class="modalBody">
            <div class="form-group">
                <label>Firstname:</label>
                <input type="text" class="form-control" ng-model="clickMember.firstname">
            </div>
            <div class="form-group">
                <label>Lastname:</label>
                <input type="text" class="form-control" ng-model="clickMember.lastname">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="text" class="form-control" ng-model="clickMember.address">
            </div>
        </div>
        <hr>
        <div class="modalFooter">
            <div class="footerBtn pull-right">
                <button class="btn btn-default" ng-click="EditModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-success" ng-click="EditModal = false; updateMember();"><span class="glyphicon glyphicon-check"></span> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="myModal" ng-show="DeleteModal">
    <div class="modalContainer">
        <div class="deleteHeader">
            <span class="headerTitle">Delete Member</span>
            <button class="closeDelBtn pull-right" ng-click="DeleteModal = false">&times;</button>
        </div>
        <div class="modalBody">
            <h5 class="text-center">Are you sure you want to delete Member</h5>
            <h2 class="text-center">{{clickMember.firstname}} {{clickMember.lastname}}</h2>
        </div>
        <hr>
        <div class="modalFooter">
            <div class="footerBtn pull-right">
                <button class="btn btn-default" ng-click="DeleteModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-danger" ng-click="DeleteModal = false; deleteMember(); "><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>
        </div>
    </div>
</div>