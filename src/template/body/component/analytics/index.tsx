import { Grid, Box } from '@mui/material';
import { __ } from '@wordpress/i18n';

const Analytics = () => {
	return (
		<Grid
			container
			direction="row"
			justifyContent="center"
			alignItems="center"
			sx={ {
				margin: 'auto',
				maxWidth: 1024,
			} }
		>
			<Grid item xs={ 12 }>
				<Box>
					<h1>{ __( 'Analytics', 'starter' ) }</h1>
				</Box>
			</Grid>
		</Grid>
	);
};

export default Analytics;
