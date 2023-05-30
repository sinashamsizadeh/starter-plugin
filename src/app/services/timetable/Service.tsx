import axios from 'axios';

const API_URL = `${ timeTableApp.url }tt/v1/timetable`;

const config = {
	headers: {
		'X-WP-Nonce': timeTableApp.nonce,
		'Content-Type': 'application/json',
	},
};

const addNewTimetable = async () => {
	const response = await axios.get( API_URL, config );

	return response.data;
};

const timeTableService = {
	addNewTimetable,
};

export default timeTableService;
