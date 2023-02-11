import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import Edit from './edit';
import save from './save';

registerBlockType('animal-shelter/meta-dogs', {
	edit: Edit,
	save,
});