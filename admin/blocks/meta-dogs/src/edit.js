import { __ } from '@wordpress/i18n';
import { TextControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
	const postType = useSelect((select) => {
		return select('core/editor').getCurrentPostType();
	}, []);

	const [meta, setMeta] = useEntityProp('postType', postType, 'meta');
	const subTitleValue = meta._blocks_course_post_subtitle;

	const onSubtitleChange = (value) => {
		setMeta({ ...meta, _blocks_course_post_subtitle: value });
	};

	return (
		<div {...useBlockProps()}>
			{subTitleValue || subTitleValue === '' ? (
				<TextControl
					label={__('Post Subtitle', 'metadata-block')}
					value={subTitleValue}
					onChange={onSubtitleChange}
				/>
			) : (
				__('Meta Field is Not Registered', 'metadata-block')
			)}
		</div>
	);
}