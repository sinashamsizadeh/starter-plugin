import { Grid, Box } from '@mui/material';
import { __ } from '@wordpress/i18n';
import AddNewButton from './addNewButton';

const Starter = () => {
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
					<h1>{ __( 'Starter', 'starter' ) }</h1>
					<AddNewButton />
				</Box>
			</Grid>
		</Grid>
	);
};

export default Starter;
