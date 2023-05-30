import React from 'react';
import { Fragment } from 'react';
import { BrowserRouter } from 'react-router-dom';
import Grid from '@mui/material/Unstable_Grid2';
import Box from '@mui/material/Box';
import Header from './template/header';
import Body from './template/body';

const App = () => {
	return (
		<BrowserRouter>
			<Fragment>
				<Grid container spacing={ 2 }>
					<Grid xs={ 2 }>
						<Box sx={ { bgcolor: '#fff', height: '100vh' } }>
							<Header />
						</Box>
					</Grid>
					<Grid xs={ 10 }>
						<Box sx={ { bgcolor: '#fff', height: '100vh' } }>
							<Body />
						</Box>
					</Grid>
				</Grid>
			</Fragment>
		</BrowserRouter>
	);
};

export default App;
