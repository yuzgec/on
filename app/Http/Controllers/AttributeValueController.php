<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeValue;


class AttributeValueController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|string|max:255',
        ]);

        $attributeValue = new AttributeValue();
        $attributeValue->attribute_id = $request->attribute_id;
        $attributeValue->value = $request->value;
        $attributeValue->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('attribute.index');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|string|max:255',
        ]);


        $attributeValue = AttributeValue::find($id);
        $attributeValue->attribute_id = $request->attribute_id;
        $attributeValue->value = $request->value;
        $attributeValue->save();

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('attribute.index');
    }

    public function destroy($id)
    {
        $Delete = AttributeValue::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('attribute.index');
    }
}
