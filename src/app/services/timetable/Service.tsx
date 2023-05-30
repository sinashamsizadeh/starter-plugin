import axios from 'axios';

const API_URL = `${ StarterApp.url }tt/v1/starter`;

const config = {
	headers: {
		'X-WP-Nonce': StarterApp.nonce,
		'Content-Type': 'application/json',
	},
};

const addNewStarter = async () => {
	const response = await axios.get( API_URL, config );

	return response.data;
};

const StarterService = {
	addNewStarter,
};

export default StarterService;
