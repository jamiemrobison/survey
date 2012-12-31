<?xml version="1.0" encoding="utf-8" ?>
<!-- <?php exit(); ?> -->
<scabbia>
	<info>
		<name>surveyAdmin</name>
		<version>1.0.2</version>
		<license>GPLv3</license>
		<phpversion>5.2.0</phpversion>
		<phpdependList />
		<fwversion>1.0</fwversion>
		<fwdependList>
			<fwdepend>string</fwdepend>
			<fwdepend>resources</fwdepend>
			<fwdepend>validation</fwdepend>
			<fwdepend>http</fwdepend>
			<fwdepend>auth</fwdepend>
			<fwdepend>zmodels</fwdepend>
		</fwdependList>
	</info>
	<includeList>
		<include>admin_questions.php</include>
	</includeList>
	<classList>
		<class>admin_questions</class>
	</classList>
	<eventList>
		<event>
			<name>blackmore_registerModules</name>
			<callback>admin_questions::blackmore_registerModules</callback>
		</event>
	</eventList>
</scabbia>
