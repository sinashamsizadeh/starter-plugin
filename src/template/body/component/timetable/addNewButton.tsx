import { useState } from 'react';
import { Button, FormControl, Modal, Box, TextField } from '@mui/material';
import { __ } from '@wordpress/i18n';
import AddCircleOutlineIcon from '@mui/icons-material/AddCircleOutline';

const style = {
	position: 'absolute',
	top: '50%',
	left: '50%',
	transform: 'translate(-50%, -50%)',
	width: 480,
	bgcolor: 'background.paper',
	border: '2px solid #000',
	boxShadow: 24,
	p: 4,
};

const AddNewButton = () => {
	const [ open, setOpen ] = useState( false );
	const handleOpen = () => setOpen( true );
	const handleClose = () => setOpen( false );

	return (
		<Box>
			<Button
				onClick={ handleOpen }
				variant="outlined"
				startIcon={ <AddCircleOutlineIcon /> }
			>
				{ __( 'Add New', 'timetable' ) }
			</Button>
			<Modal
				open={ open }
				onClose={ handleClose }
				aria-labelledby="modal-modal-title"
				aria-describedby="modal-modal-description"
			>
				<Box
					component="form"
					sx={ style }
					noValidate
					autoComplete="off"
				>
					<FormControl fullWidth variant="filled">
						<TextField
							className="timetable-field"
							id="timetable-field"
							label={ __( 'Timetable Name', 'timetable' ) }
							variant="filled"
						/>
					</FormControl>
				</Box>
			</Modal>
		</Box>
	);
};

export default AddNewButton;
