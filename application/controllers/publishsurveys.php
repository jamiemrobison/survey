<?php

	/**
	 * @ignore
	 */
	class publishsurveys extends controller {
		/**
		 * @ignore
		 */
		public function get_new() {
			statics::requireAuthentication(1);
			$this->load('surveyModel');
			$surveys = $this->surveyModel->getAllByOwner(statics::$user['userid']);
			$this->setRef('surveys', $surveys);
			// render the page
			$this->view();
		}
		/**
		 * @ignore
		 */
		public function post_new() {
			statics::requireAuthentication(1);
			$this->load('publishSurveyModel');
				$input = array(
					'surveypublishid' => string::generateUuid(),
					'surveyid' => http::post('surveyid'),
					'revision' => '1',
					'ownerid' => statics::$user['userid'],
					'startdate' => http::post('startdate'),
					'enddate' => http::post('enddate'),
					'password' => http::post('password'),
					'type' => http::post('type'),
					'enabled' => http::post('enabled')
				);
				$insertSurvey = $this->publishSurveyModel->insert($input);
			if($insertSurvey > 0){
				echo "<script>alert('Survey Added Successfuly');</script>";
			}
			else {
				echo "<script>alert('Unexpected Error.');</script>";
			}
			$this->load('surveyModel');
			$surveys = $this->surveyModel->getAllByOwner(statics::$user['userid']);
			$this->setRef('surveys', $surveys);
			$this->view();
		}

		/**
		 * @ignore
		 */

		public function get_index() {
			statics::requireAuthentication(1);
			$this->load('publishSurveyModel');
			$this->load('surveyModel');
			// gather all survey data from model

			$tSurveyPublishs = $this->publishSurveyModel->getAllByOwner(statics::$user['userid']);



			// assign the user data to view
			$this->setRef('SurveyPublishs', $tSurveyPublishs);
			$this->setRef('surveys', $surveys);

			// render the page
			$this->view();
		}

		/**
		 * @ignore
		 */
		public function get_edit($uSurveyPublishsId) {
			statics::requireAuthentication(1);
			$this->load('publishSurveyModel');
			// gather all survey data from model
			$tSurvey = $this->publishSurveyModel->get($uSurveyPublishsId);

			// assign the user data to view
			$this->set('publishSurveys', $tSurvey);
			// render the page
			$this->view();
		}

		/**
		 * @ignore
		 */
		public function post_edit($uSurveyPublishId) {
			statics::requireAuthentication(1);
			$this->load('publishSurveyModel');
			$update = array(
				'revision' => '1',
				'ownerid' => statics::$user['userid'],
				'startdate' => http::post('startdate'),
				'enddate' => http::post('enddate'),
				'password' => http::post('password'),
				'type' => http::post('type'),
				'enabled' => http::post('enabled')
			);
			// gather all survey data from model
			$tEditPublish = $this->publishSurveyModel->update($uSurveyPublishId, $update);
			if($tEditPublish > 0){
				echo "<script> alert('Record updated successfuly.');</script>";
			}
			else{
				echo "<script> alert('Unexpected Error. Try Again Later.');</script>";
			}
				$tSurvey = $this->publishSurveyModel->get($uSurveyPublishId);
			// assign the user data to view

			$this->set('publishSurveys', $tSurvey);
			// render the page
			$this->view();
		}

		/**
		 * @ignore
		 */
		public function get_report($uSurveyId) {
			statics::requireAuthentication(1);

			$this->load('surveyModel');

			// gather all survey data from model
			$tSurvey = $this->surveyModel->get($uSurveyId);
			
			// assign the user data to view
			$this->setRef('survey', $tSurvey);

			// render the page
			$this->view();
		}
	}

?>
