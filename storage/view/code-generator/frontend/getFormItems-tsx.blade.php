/**
 * MineAdmin is committed to providing solutions for quickly building web applications
 * Please view the LICENSE file that was distributed with this source code,
 * For the full copyright and license information.
 * Thank you very much for using MineAdmin.
 *
 * @Author X.Mo<root@imoi.cn>
 * @Link   https://github.com/mineadmin
 */
import type { MaFormItem } from '@mineadmin/form'
import type { {{$codeGenerator->getName()}}Vo } from '~/{{ $codeGenerator->getPackageName() }}/api/{{ $codeGenerator->getName() }}.ts'

export default function getFormItems(formType: 'add' | 'edit' = 'add', t: any, model: {{$codeGenerator->getName()}}Vo): MaFormItem[] {
  // 新增默认值
  if (formType === 'add') {
    // todo...
  }

  // 编辑默认值
  if (formType === 'edit') {
    // todo...
  }

  return [
    @foreach($codeGenerator->fields as $field)
      @if($field->is_form)
    {
      label: @if (isset($field->i18n)) t('{{$field->i18n}}') @else '{{$field->comment}}' @endif,
      prop: '{{$field->name}}',
      render: () => <{{$field->form_component}} />,
      @if(!empty($field->form_component_config))
      renderProps: @json($field->form_component_config, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),
      @elseif(!empty($field->form_dicts_name) && in_array($field->form_component, ['ma-dict-radio', 'ma-dict-checkbox', 'ma-dict-select']))
      renderProps: {
          dictName: "{{$field->name}}",
          transScope: "global",
          data: []
      },
      @endif
      @if($codeGenerator->is_required)
      itemProps: {
        rules: [{ required: true, message: '请输入{{$field->comment}}' }],
      },
      @endif
    },
      @endif
    @endforeach
  ]
}
